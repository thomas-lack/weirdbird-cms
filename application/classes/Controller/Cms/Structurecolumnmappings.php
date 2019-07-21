<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cms_StructureColumnMappings extends Controller_Cms_Data
{
    public function action_index()
    {
    }

    public function action_read()
    {
        $objToArray = function ($obj) {
            return $obj->as_array();
        };

        $result = array_map(
            $objToArray,
            ORM::factory('StructureColumnMapping')->find_all()->as_array()
        );

        $this->template->result = $result;
    }

    public function action_update()        // works as UPDATE and CREATE method
    {
        $data = $this->request->post();

        $mapping = ORM::factory('StructureColumnMapping')
            ->where('structure_id', '=', $data['structure_id'])
            ->where('column', '=', $data['column'])
            ->find();
        // in case we cannot UPDATE we insert all the data again
        // to CREATE a new relation
        $mapping->structure_id = $data['structure_id'];
        $mapping->column = $data['column'];
        $mapping->module_id = $data['module_id'];
        $mapping->save();

        // since we did a possible update of a module, it is possible, that
        // previously connected articles are not allowed anymore
        // -> mark those articles as 'orphaned' by deleting the mapping id
        $module = ORM::factory('Module', $mapping->module_id);
        if ($module->allowarticles == 0) {
            $articles = ORM::factory('Article')
                ->where('structure_column_mapping_id', '=', $mapping->id)
                ->find_all();

            foreach ($articles as $article) {
                $article->structure_column_mapping_id = null;
                $article->active = 0;
                $article->save();
            }
        }

        $this->template->result = array('success' => true);
    }
}
