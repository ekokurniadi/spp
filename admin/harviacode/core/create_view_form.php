<?php 

$string="
<!-- page content -->
<div class=\"right_col\" role=\"main\">
     <div class=\"\">
       <div class=\"page-title\">
         <div class=\"title_left\">
           <h3>".ucfirst($table_name)."<small>Control Panel</small></h3>
         </div>
         <div class=\"title_right\">
           <div class=\"col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search\">
             <div class=\"input-group\">
               <input type=\"text\" class=\"form-control\" placeholder=\"Search for...\">
               <span class=\"input-group-btn\">
                 <button class=\"btn btn-default\" type=\"button\">Go!</button>
               </span>
             </div>
           </div>
         </div>
       </div>
       </div>

<div class=\"clearfix\">
<div class=\"col-md-12 col-xs-12 col-sm-12\">
                <div class=\"x_panel\">
                  <div class=\"x_title\">
                    <h2>".ucfirst($table_name)."<small></small></h2>
                    <ul class=\"nav navbar-right panel_toolbox\">
                      <li><a class=\"collapse-link\"><i class=\"fa fa-chevron-up\"></i></a>
                      </li>
                      <li class=\"dropdown\">
                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-expanded=\"false\"><i class=\"fa fa-wrench\"></i></a>
                        <ul class=\"dropdown-menu\" role=\"menu\">
                          <li><a href=\"#\">Settings 1</a>
                          </li>
                          <li><a href=\"#\">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class=\"close-link\"><i class=\"fa fa-close\"></i></a>
                      </li>
                    </ul>
                    <div class=\"clearfix\"></div>
                  </div>
                  <div class=\"x_content\">
                    <br />
                    <form action=\"<?php echo \$action; ?>\" method=\"post\" class=\"form-horizontal\">";     
foreach ($non_pk as $row) {
    if ($row["data_type"] == 'text')
    {
    $string .= "\n\t    
        <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"".$row["column_name"]."\">".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></label>
            <div class=\"col-sm-6\">
                <textarea class=\"ckeditor\" rows=\"3\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\"><?php echo $".$row["column_name"]."; ?></textarea>
            </div>
    </div>";
    
    } else
    {
    $string .= "\n\t   
    
        <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"".$row["data_type"]."\">".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></label>
            <div class=\"col-sm-6\">
                <input type=\"text\" class=\"form-control\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\" value=\"<?php echo $".$row["column_name"]."; ?>\" />
            </div>
    </div>";
    }
}
$string .= "\n\t    
<div class=\"form-group\">
    <input type=\"hidden\" name=\"".$pk."\" value=\"<?php echo $".$pk."; ?>\" /> ";
$string .= "\n\t    <button type=\"submit\" class=\"btn btn-success\"><?php echo \$button ?></button> ";
$string .= "\n\t    <a href=\"<?php echo site_url('".$c_url."') ?>\" class=\"btn btn-default\">Cancel</a>";

$string .= "\n\t
</div>
</form>
                  </div>
                </div>
              </div>
            </div>
        </div>
";

$hasil_view_form = createFile($string, $target."views/" . $v_form_file);

?>


