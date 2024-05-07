<?php

use yii\db\Migration;

/**
 * Class m240507_104237_kategori_obat
 */
class m240507_104237_kategori_obat extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%kategori_obat}}', [
            'id' => $this->primaryKey(), // Tipe data integer dengan opsi AUTO_INCREMENT
            'nama_kategori' => $this->string(255)->notNull(),
            'deskripsi_kategori' => $this->text()->notNull(),
        ]);

        $this->batchInsert('{{%kategori_obat}}', ['nama_kategori', 'deskripsi_kategori'], [
            ['cair', 'obat berbentuk cair'],
            ['bubuk', 'obat berbentuk cair'],
            ['kapsul', 'obat berbentuk kapsul'],
            ['kaplet', 'obat berbentuk kaplet'],
            ['hisap', 'obat hisap'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%kategori_obat}}');
    }
    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240507_104237_kategori_obat cannot be reverted.\n";

        return false;
    }
    */
}
