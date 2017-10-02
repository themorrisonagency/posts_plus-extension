<?php namespace Morrison\PostsPlusExtension\Post\Table;

use Anomaly\PostsModule\Post\PostModel;
use Anomaly\Streams\Platform\Ui\Table\Table;

class PostTableBuilder extends \Anomaly\PostsModule\Post\Table\PostTableBuilder
{
    protected $model = PostModel::class;

    /**
     * Table Builder Constructor
     * @param Table $table
     */
    public function __construct(Table $table)
    {
        $filters_split = array_chunk($this->filters, 3, true);
        $filters_insert = array(
            'type',
        );
        $this->filters = array_merge($filters_split[0], $filters_insert, $filters_split[1]);

        $columns_split = array_chunk($this->columns, 3, true);
        $columns_insert = array(
            'type' => [
                'heading' => 'morrison.extension.posts_plus::field.type',
            ],
        );
        $this->columns = array_merge($columns_split[0], $columns_insert, $columns_split[1]);

        parent::__construct($table);
    }
}
