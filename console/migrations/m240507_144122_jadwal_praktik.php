<?php

use yii\db\Migration;

/**
 * Class m240507_144122_jadwal_praktik
 */
class m240507_144122_jadwal_praktik extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%jadwal_praktik}}', [
            'id' => $this->primaryKey(),
            'Hari' => $this->string()->notNull(),
            'jam_mulai' => $this->time()->notNull(),
            'jam_selesai' => $this->time()->notNull(),
        ]);

        $this->batchInsert('{{%jadwal_praktik}}', ['hari', 'jam_mulai', 'jam_selesai'], [
            ['Senin', '08:00', '17:00'],
            ['Selasa', '08:00', '17:00'],
            ['Rabu', '08:00', '17:00'],
            ['Kamis', '08:00', '17:00'],
            ['Jumat', '08:00', '17:00'],
            ['Sabtu', '08:00', '12:00'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%jadwal_praktik}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240507_144122_jadwal_praktik cannot be reverted.\n";

        return false;
    }
    */
}
