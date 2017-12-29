<?php
namespace App\Helpers;
use DB;

class Helper
{
    public static function getCategories($pid = "0")
    {
        $tree = array();
        $parent  =  DB::table('categories')->select('id','title','parent_id')->where('parent_id',$pid)->get();
        foreach ($parent as $parents)
        {
            $cat = array();
            $cat['id'] = $parents->id;
            $cat['name'] = $parents->title;
            $cat['parent_id'] = $parents->parent_id;
            $cat['childs'] = self::getCategories($parents->id);
            $tree[$parents->id] = $cat;
        }
        return $tree;
    }


    public static function arrayToList($arr)
    {
        $list = "<ol style='line-height:14px;'>";
        foreach($arr as $v)
        {
             $bold = $v['parent_id']==0?'bold':'';
             $list.="<li  style='font-weight:".$bold."'>".ucfirst($v['name'])."</li>";
             if(count($v['childs']) > 0 )
             {
                $list .= self::arrayToList($v['childs']);
             }

        }
        $list .= "</ol>";
        return $list;
    }

    public static function categOptions($arr)
    {
       foreach($arr as $v)
       {

         if(count( $v['childs'] > 0 ) )
         {
            //  foreach()
         }

       }
    }


}
