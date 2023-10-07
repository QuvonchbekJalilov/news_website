<?php

namespace common\models;

use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $title
 * @property string|null $content
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $category_id
 * @property int|null $tag_id
 *
 * @property Category $category
 * @property Tag $tag
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
     public $imageFile;
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['content' , 'image'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['category_id', 'tag_id'], 'integer'],
            [['title' , 'image'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
            [['tag_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tag::class, 'targetAttribute' => ['tag_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'category_id' => 'Category ID',
            'tag_id' => 'Tag ID',
            'image' => 'Rasm'
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }
    public function getImage()
{
    return $this->hasOne(NewsImage::class, ['news_id' => 'id']);
}
public function getNewsImages(): ActiveQuery
{
    return $this->hasMany(NewsImage::class, ['news_id' => 'id']);
}

    /**
     * Gets query for [[Tag]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTag()
    {
        return $this->hasOne(Tag::class, ['id' => 'tag_id']);
    }

}
