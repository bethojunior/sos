<?php


class ContentController extends BaseController
{
    public function actionInsert()
    {
        $name        = $this->byPost['name'];
        $value       = $this->byPost['value'];
        $description = $this->byPost['description'];
        $ref         = $this->byPost['ref'];
        $return = $this->contentDao->insertContent($name , $value , $description , $ref);
        echo $return;
    }

    public function actionGet()
    {
        $return = $this->contentDao->getbyId($this->byPost['id']);
        echo $return;
    }

    public function actionDelete()
    {
        $id = $this->byPost['id'];
        echo $this->contentDao->deleteContent($id);
    }

    public function actionGetAll()
    {
        echo $this->baseDao->dbGetAll('products');
    }

}