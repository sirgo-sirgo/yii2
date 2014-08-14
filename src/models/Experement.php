<?php

namespace app\models;

use Yii;
use  yii\db\ActiveRecord;
use app\models\Results;
//use  yii\base\Application;

/**
 * This is the model class for table "experement".
 *
 * @property integer $id_exp
 * @property string $date
 * @property string $time
 * @property string $name
 * @property integer $bones_num
 * @property integer $throws
 *
 * @property Results[] $results
 */
class Experement extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'experement';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['bones_num', 'throws'], 'integer'],
            [['date', 'time', 'name'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id_exp' => 'Id Exp',
            'date' => 'Date',
            'time' => 'Time',
            'name' => 'Name',
            'bones_num' => 'Bones Num',
            'throws' => 'Throws',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResults() {
        return $this->hasMany(Results::className(), ['id_exp' => 'id_exp']);
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            
            $this->date = date("d.m.y");
           
            Yii::$app->formatter->timeZone = null;
            Yii::$app->formatter->timeFormat = 'H:i:s';
            date_default_timezone_set('Europe/Kiev');
            $this->time = date('H:i:s');
            $this->bones_num = 2;
            return true;
        } else
            return false;
    }
    
    public function afterSave($insert, $changedAttributes){
        
        $results = [11];
        
        for ($j = 0; $j < 11; $j++){
            $results[$j] = new Results;
            $results[$j]->setAttribute('num', $j+2);
            $results[$j]->setAttribute('count', 0);
            $results[$j]->link('experiment', $this);
        }
        
        for($j; $j<$this->throws; $j++) {
            $throwValue = rand(1 ,6) + rand(1 ,6);
            $results[$throwValue-2]->increaseCount();
        }
        
        foreach($results as $result) {
            $result->save();
        }
    }

}
