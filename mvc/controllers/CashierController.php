<?php


class CashierController extends BaseController
{

    public function actionInsert()
    {
        $idwho = $this->byPost['idwho'];
        $what  = implode(',', $this->byPost['what']) ;
        $valuesale = $this->byPost['valuesale'];
        echo $this->cashDao->insert($idwho,$what,$valuesale);
    }


    public function actionGet()
    {
        $return = $this->cashDao->getbyId($this->byPost['id']);
        echo $return;
    }

    public function actionDelete()
    {
        $id = $this->byPost['id'];
        echo $this->cashDao->deleteContent($id);
    }

    public function actionGetAll()
    {
        echo $this->baseDao->dbGetAll('caixa');
    }

}