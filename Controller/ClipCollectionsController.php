<?php

class BookCollectionsController extends AppController
{
    public $name = 'BookCollections';
    public function add()
    {
        $screenCollections = $this->BookCollection->ScreenCollection->find('list', array('limit'=>200, 'fields'=> array('id','name_with_count')));
        $screenCollectionsScreenCount = $this->BookCollection->ScreenCollection->find('list', array('limit'=>200, 'fields'=> array('id','screen_count')));
        $books = $this->BookCollection->Book->find('list', array('limit'=>200));

        $this->set(compact('screenCollections','books','screenCollectionsScreenCount'));

    }
     
}