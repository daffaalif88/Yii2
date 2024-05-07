<?php

use yii\db\Migration;

/**
 * Class m240507_151110_transaksi_penyakit
 */
class m240507_151110_transaksi_penyakit extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('{{%transaksi_penyakit}}', [
            'id' => $this->primaryKey(),
            'id_transaksi' => $this->integer()->notNull(),
            'id_penyakit' => $this->integer()->notNull(),
            'jumlah' => $this->integer()->notNull()->defaultValue(0),
        ]);

        $this->addForeignKey(
            'fk-transaksi_penyakit-id_transaksi',
            '{{%transaksi_penyakit}}',
            'id_transaksi',
            '{{%transaksi}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-transaksi_penyakit-id_penyakit',
            '{{%transaksi_penyakit}}',
            'id_penyakit',
            '{{%penyakit}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-transaksi_penyakit-id_penyakit', '{{%transaksi_penyakit}}');
        $this->dropForeignKey('fk-transaksi_penyakit-transaksi_id', '{{%transaksi_penyakit}}');

        $this->dropTable('{{%transaksi_penyakit}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240507_151110_transaksi_penyakit cannot be reverted.\n";

        return false;
    }
    */
}
