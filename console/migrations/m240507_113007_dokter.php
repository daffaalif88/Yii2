<?php

use yii\db\Migration;

/**
 * Class m240507_113007_dokter
 */
class m240507_113007_dokter extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%dokter}}', [
            'id' => $this->primaryKey(), // Tipe data integer dengan opsi AUTO_INCREMENT
            'nik' => $this->string()->notNull(),
            'nama_dokter' => $this->string(255)->notNull(),
            'tanggal_lahir' => $this->date()->notNull(),
            'jenis_kelamin' => $this->string(1)->notNull()->check("jenis_kelamin IN ('L', 'P')"),
        ]);

        $this->batchInsert('{{%dokter}}', ['nik', 'nama_dokter', 'tanggal_lahir', 'jenis_kelamin'], [
            ['0987678990', 'Dr. Haris', '2000-02-01', 'L'],
            ['0987654789', 'Dr. Mulky', '2000-02-01', 'P'],
            ['1234567898', 'Dr. Rajab', '2000-02-01', 'L'],
            ['0987654321', 'Dr. Anshori', '2000-02-01', 'L'],
            ['0129384756', 'Dr. Manak', '2000-02-01', 'L'],
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%dokter}}');
       
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240507_113007_dokter cannot be reverted.\n";

        return false;
    }
    */
}
