<?php

class Controller {

    private Model $model; 
    private View $view;

    public function __construct(View $view, Model $model) {
        $this->model = $model;
        $this->view = $view;
    }

    //GETTER ET SETTER
    public function getModel():Model{
        return $this->model;
    }

    public function setModel(Model $newModel):self{
        $this->model= $newModel;
        return $this;
    }

    public function getView():View{
        return $this->view;
    }

    public function setView(View $newView):self{
        $this->view = $newView;
        return $this;
    }

    //METHODS
    public function render():void{

        $data = $this->getModel()->findAll();
        $this->getView()->setData($data)->displayAll();
    }

}