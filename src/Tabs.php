<?php

namespace Lampdev\Tabs;

use Laravel\Nova\Panel;
use Laravel\Nova\Fields\Text;

class Tabs extends Panel
{
    /**
     * Add fields to the Tab.
     *
     * @param string $tab
     * @param array  $fields
     */
    public function addFields($tab, array $fields): self
    {
        foreach ($fields as $field) {
            $field->panel = $this->name;
            $field->name = $this->name;
            $field->withMeta([
                'tab' => $tab,
            ]);

            $this->data[] = $field;
        }

        return $this;
    }

    /**
     * Prepare the panel for JSON serialization.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return array_merge(parent::jsonSerialize(), [
            'component' => 'detail-tabs'
        ]);
    }

    /**
     * Prepare the given fields.
     *
     * @param  \Closure|array $fields
     * @return array
     */
    protected function prepareFields($fields)
    {
        collect(is_callable($fields) ? $fields() : $fields)->each(function ($fields, $key) {
            if (is_string($key) && is_string($fields)) {
                $panel = new Panel($key, [
                    Text::make($key, function () use ($fields) {
                        return $fields;
                    })->asHtml()
                ]);
            }

            $this->addFields($panel->name, $panel->data);
        });

        return $this->data;
    }
}
