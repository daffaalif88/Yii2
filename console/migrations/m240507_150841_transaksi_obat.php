<?php

use yii\db\Migration;

/**
 * Class m240507_150841_transaksi_obat
 */
class m240507_150841_transaksi_obat extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%transaksi_obat}}', [
            'id' => $this->primaryKey(),
            'id_transaksi' => $this->integer()->notNull(),
            'id_obat' => $this->integer()->notNull(),
            'jumlah' => $this->integer()->notNull()->defaultValue(0),
        ]);

        $this->addForeignKey(
            'fk-transaksi_obat-id_transaksi',
            '{{%transaksi_obat}}',
            'id_transaksi',
            '{{%transaksi}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-transaksi_obat-id_obat',
            '{{%transaksi_obat}}',
            'id_obat',
            '{{%obat}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-transaksi_obat-id_obat', '{{%transaksi_obat}}');
        $this->dropForeignKey('fk-transaksi_obat-transaksi_id', '{{%transaksi_obat}}');

        $this->dropTable('{{%transaksi_obat}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240507_150841_transaksi_obat cannot be reverted.\n";

        return false;
    }
    */
}
