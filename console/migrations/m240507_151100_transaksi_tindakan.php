<?php

use yii\db\Migration;

/**
 * Class m240507_151100_transaksi_tindakan
 */
class m240507_151100_transaksi_tindakan extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%transaksi_tindakan}}', [
            'id' => $this->primaryKey(),
            'id_transaksi' => $this->integer()->notNull(),
            'id_tindakan' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-transaksi_tindakan-id_transaksi',
            '{{%transaksi_tindakan}}',
            'id_transaksi',
            '{{%transaksi}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-transaksi_tindakan-id_tindakan',
            '{{%transaksi_tindakan}}',
            'id_tindakan',
            '{{%tindakan}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-transaksi_tindakan-id_tindakan', '{{%transaksi_tindakan}}');
        $this->dropForeignKey('fk-transaksi_tindakan-transaksi_id', '{{%transaksi_tindakan}}');

        $this->dropTable('{{%transaksi_tindakan}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240507_151100_transaksi_tindakan cannot be reverted.\n";

        return false;
    }
    */
}
