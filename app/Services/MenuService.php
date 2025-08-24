<?php

namespace App\Services;

use App\Models\Backend\Menu;
use App\Models\Backend\MenuItem;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class MenuService {


    protected string $module        = BACKEND;
    protected string $route_name    = 'backend.menu.';
    protected string $resource_path     = 'backend.menu.';

    private Menu $model;

    public function __construct(DataTables $dataTables)
    {
        $this->model        = new Menu();
        $this->dataTables = $dataTables;
    }

    public function getMenuStructureData(){
        if(isset($_GET['slug']) && $_GET['slug'] != 'new'){
            $id = $_GET['slug'];
            $data['desiredMenu'] = $this->model->where('slug',$id)->first();
            $data['menuTitle']   =  $data['desiredMenu']->title;
            if($data['desiredMenu']->content != ''){
                $data['menuitems'] = json_decode($data['desiredMenu']->content);
                if(@$data['menuitems'][0] != null){
                    $data['menuitems'] = $data['menuitems'][0];
                    foreach($data['menuitems'] as $menu){
                        $menu->title    = MenuItem::where('id',$menu->id)->value('title');
                        $menu->name     = MenuItem::where('id',$menu->id)->value('name');
                        $menu->slug     = MenuItem::where('id',$menu->id)->value('slug');
                        $menu->target   = MenuItem::where('id',$menu->id)->value('target');
                        $menu->type     = MenuItem::where('id',$menu->id)->value('type');
                        if(!empty($menu->children[0])){
                            foreach ($menu->children[0] as $child) {
                                $child->title   = MenuItem::where('id',$child->id)->value('title');
                                $child->name    = MenuItem::where('id',$child->id)->value('name');
                                $child->slug    = MenuItem::where('id',$child->id)->value('slug');
                                $child->target  = MenuItem::where('id',$child->id)->value('target');
                                $child->type    = MenuItem::where('id',$child->id)->value('type');
                                if(!empty($child->children[0])){
                                    foreach ($child->children[0] as $minichild) {
                                        $minichild->title   = MenuItem::where('id',$minichild->id)->value('title');
                                        $minichild->name    = MenuItem::where('id',$minichild->id)->value('name');
                                        $minichild->slug    = MenuItem::where('id',$minichild->id)->value('slug');
                                        $minichild->target  = MenuItem::where('id',$minichild->id)->value('target');
                                        $minichild->type    = MenuItem::where('id',$minichild->id)->value('type');
                                    }
                                }
                            }
                        }
                    }
                }else{
                    $data['desiredMenu']->content = null;
                    $data['desiredMenu']->update();
                }
            }else{
                $data['menuitems'] = MenuItem::where('menu_id', $data['desiredMenu']->id)->get();
            }
        }
        else{
            $data['desiredMenu'] = $this->model->descending()->first();
            if( $data['desiredMenu'] !== null){
                $data['menuTitle']   =  $data['desiredMenu']->title;
            }else{
                $data['menuTitle']   = "";
            }
            if( $data['desiredMenu']){
                if( $data['desiredMenu']->content != ''){
                    $data['menuitems'] = json_decode( $data['desiredMenu']->content);
                    if(@$data['menuitems'][0] != null){
                        $data['menuitems'] = $data['menuitems'][0];
                        foreach($data['menuitems'] as $menu){
                            $menu->title    = MenuItem::where('id',$menu->id)->value('title');
                            $menu->name     = MenuItem::where('id',$menu->id)->value('name');
                            $menu->slug     = MenuItem::where('id',$menu->id)->value('slug');
                            $menu->target   = MenuItem::where('id',$menu->id)->value('target');
                            $menu->type     = MenuItem::where('id',$menu->id)->value('type');
                            if(!empty($menu->children[0])){
                                foreach ($menu->children[0] as $child) {
                                    $child->title   = MenuItem::where('id',$child->id)->value('title');
                                    $child->name    = MenuItem::where('id',$child->id)->value('name');
                                    $child->slug    = MenuItem::where('id',$child->id)->value('slug');
                                    $child->target  = MenuItem::where('id',$child->id)->value('target');
                                    $child->type    = MenuItem::where('id',$child->id)->value('type');
                                    if(!empty($child->children[0])){
                                        foreach ($child->children[0] as $minichild) {
                                            $minichild->title   = MenuItem::where('id',$minichild->id)->value('title');
                                            $minichild->name    = MenuItem::where('id',$minichild->id)->value('name');
                                            $minichild->slug    = MenuItem::where('id',$minichild->id)->value('slug');
                                            $minichild->target  = MenuItem::where('id',$minichild->id)->value('target');
                                            $minichild->type    = MenuItem::where('id',$minichild->id)->value('type');
                                        }
                                    }
                                }
                            }
                        }
                    }else{
                        $data['desiredMenu']->content = null;
                        $data['desiredMenu']->update();
                    }
                }else{
                    $data['menuitems'] = MenuItem::where('menu_id', $data['desiredMenu']->id)->get();
                }
            }
        }

        return $data;
    }

}
