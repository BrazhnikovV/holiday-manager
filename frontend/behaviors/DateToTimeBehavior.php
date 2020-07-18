<?php
namespace frontend\behaviors;

use yii\behaviors\AttributeBehavior;
use yii\base\InvalidConfigException;


class DateToTimeBehavior extends AttributeBehavior {

    public $timeAttribute;

    public function getValue($event) {

        if (empty($this->timeAttribute)) {
            throw new InvalidConfigException(
                'Can`t find "fromAttribute" property in ' . $this->owner->className()
            );
        }

        if (!empty($this->owner->{$this->attributes[$event->name]})) {
            $this->owner->{$this->timeAttribute} = strtotime(
                $this->owner->{$this->attributes[$event->name]}
            );

            return date('Y-m-d', $this->owner->{$this->timeAttribute});
        } else if (!empty($this->owner->{$this->timeAttribute})
            && is_numeric($this->owner->{$this->timeAttribute})
        ) {
            $this->owner->{$this->attributes[$event->name]} = date(
                'Y-m-d',
                $this->owner->{$this->timeAttribute}
            );

            return $this->owner->{$this->attributes[$event->name]};
        }

        return null;
    }
}
