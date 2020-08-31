<?php

namespace models;


class GeneralModel 
{

  public function get_menu($role)
  {
      $routes = include $_SERVER['DOCUMENT_ROOT'].'/app/Routes.php';
      $access_user = unserialize($_SESSION['access']);

      $menu .= '<div class="sidebar-category sidebar-category-visible">
                  <div class="category-content no-padding">
                    <ul class="navigation navigation-main navigation-accordion">';

      $menu .=      '<li class="nav-item">
                      <a href="http://'.$_SERVER['HTTP_HOST'].'/public/list_of_applications" target="_blank">
                        <i class="icon-calendar3 navbar-nav-link dropdown-toggle caret-0"></i> 
                          <span>Площадка заявок</span>
                      </a>
                    </li>';

                    foreach ($routes as $key => $value) 
                    {
                        if($value['authorization'] === true)
                        {     
                            if(in_array($value['category']['name_category'], $access_user))
                            {
                               $menu .= '<li class="navigation-header"><span>'.$value['category']['title'].'</span> <i class="icon-menu" title="'.$value['category']['title'].'"></i></li>';
                                foreach ($value['url'] as $key_2 => $value_2) 
                                {

                                    if(in_array($value_2['controller'].'/'.$value_2['action'], $access_user))
                                    {
                                        if($value_2['parent'] === false)
                                        {
                                          $menu .= '<li><a href="http://'.$_SERVER['HTTP_HOST'].'/'.$value_2['controller'].'/'.$value_2['action'].'"><i class="'.$value_2['icon'].'"></i> <span>'.$value_2['title'].'</span></a></li>';
                                        }
                                        elseif($value_2['parent'] === true)
                                        {
                                          $menu .=
                                               '<li class="nav-item '.$active.'">
                                                  <a href="#"><i class="'.$value_2['icon'].'"></i> <span>'.$value_2['title'].'</span></a>
                                                  <ul>';
                                                  foreach ($value_2['child'] as $key_child => $value_child) {
                                                     $menu .= '<li><a href="http://'.$_SERVER['HTTP_HOST'].'/'.$value_child['controller'].'/'.$value_child['action'].'"><i class="'.$value_child['icon'].'"></i> <span>'.$value_child['title'].'</span></a></li>';
                                                  }
                                          $menu .= 
                                                  '</ul>
                                                </li>';
                                        }
                                    }
                                }
                            }
                        }
                    }

      $menu .='     </ul>
                  </div>
                </div>';

                return $menu;
  }

  public function create_role($role)
  {
      $routes = include $_SERVER['DOCUMENT_ROOT'].'/app/Routes.php';
      $menu.= '<div class="row">';
      $i = 1;
        foreach ($routes as $key => $value) 
        {
          if($value['authorization'] == true){
            $menu .= '<div class="col-md-4" style="margin-bottom:30px;">
                        <div class="checkbox checkbox-switchery switchery-lg switchery-double" style="margin-left:-8px;">
                            <label>
                                <input type="checkbox" class="switchery"  name="'.$value['category']['name_category'].'" id="'.$value['category']['name_category'].'" onclick = "access_roles(\''.$value['category']['name_category'].'-'.$i.'\')">
                                    '.$value['category']['title'].'
                                </label>
                        <hr>';
                foreach ($value['url'] as $key_2 =>$value_urls) 
                {
                  if($value_urls['parent'] == true)
                  {
                    $menu .='<div>
                                <div class="checkbox checkbox-switchery switchery-sm disabled">
                                  <label>
                                      <input type="checkbox"   disabled class="switchery '.$value['category']['name_category'].'-class" name = "'.$value_urls['controller'].'/'.$value_urls['action'].'" onclick = "access_roles_subclass(\''.$value['category']['name_category'].'-sub-'.$i.'\')">'
                                      .$value_urls['title'].'
                                  </label>
                                </div>
                              </div>';
                    foreach ($value_urls['child'] as $key_3 => $value_3) 
                    {
                      $menu .='<div style="margin-left:10px;">
                                <div class="checkbox checkbox-switchery switchery-xs disabled">
                                  <label>
                                      <input type="checkbox"   disabled class="switchery '.$value['category']['name_category'].'-subclass" name = "'.$value_3['controller'].'/'.$value_3['action'].'">'
                                      .$value_3['title'].'
                                  </label>
                                </div>
                              </div>';
                    }
                  }
                  else
                  {
                   $menu .='<div>
                              <div class="checkbox checkbox-switchery switchery-sm disabled">
                                <label>
                                    <input type="checkbox"   disabled class="switchery '.$value['category']['name_category'].'-class" name = "'.$value_urls['controller'].'/'.$value_urls['action'].'">'
                                    .$value_urls['title'].'
                                </label>
                              </div>
                            </div>';

                  }
                }

                 $menu .='</div>
                      </div>  ';
            $i++;
          }
        }
      $menu.= '</div>';
      return $menu;
  }
 
}
