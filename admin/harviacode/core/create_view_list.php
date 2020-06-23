<?php
$string="
<!-- page content -->
<div class=\"right_col\" role=\"main\">
     <div class=\"\">
       <div class=\"page-title\">
         <div class=\"title_left\">
           <h3>".ucfirst($table_name)."<small></small></h3>
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

       <div class=\"clearfix\"></div>


         <div class=\"col-md-12 col-sm-6 col-xs-12\">
           
           <div class=\"x_panel\">
           <div class=\"col-md-4\">
             <?php echo anchor(site_url('".$c_url."/create'),'Create', 'class=\"btn btn-primary\"'); ?>
             <?php echo \$this->session->userdata('message') <> '' ? \$this->session->userdata('message') : ''; ?>
             </div>
             <div class=\"x_title\">
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
             <table id=\"example1\" class=\"table table-bordered table-striped\">
       <thead>
       <tr>
           <th>#</th>";
foreach ($non_pk as $row) {
$string .= "\n\t\t<th>" . label($row['column_name']) . "</th>";
}
$string .= "\n\t\t<th>Action</th>
       </tr>
       </thead>  
       <tbody>";
$string .= "<?php
       foreach ($" . $c_url . "_data as \$$c_url)
       {
           ?>
         
           <tr>";

$string .= "\n\t\t\t<td width=\"80px\"><?php echo ++\$start ?></td>";
foreach ($non_pk as $row) {
$string .= "\n\t\t\t<td><?php echo $" . $c_url ."->". $row['column_name'] . " ?></td>";
}


$string .= "\n\t\t\t<td style=\"text-align:center\" width=\"200px\">"
   . "\n\t\t\t\t<?php "
   . "\n\t\t\t\techo anchor(site_url('".$c_url."/read/'.$".$c_url."->".$pk."),'<i class=\"fa fa-eye\"></i>',array('title'=>'detail','class'=>'btn btn-default btn-sm')); "
   . "\n\t\t\t\techo '  '; "
   . "\n\t\t\t\techo anchor(site_url('".$c_url."/update/'.$".$c_url."->".$pk."),'<i class=\"fa fa-pencil-square-o\"></i>',array('title'=>'edit','class'=>'btn btn-warning btn-sm')); "
   . "\n\t\t\t\techo '  '; "
   . "\n\t\t\t\techo anchor(site_url('".$c_url."/delete/'.$".$c_url."->".$pk."),'<i class=\"fa fa-trash-o\"></i>','title=\"delete\" class=\"btn btn-danger btn-sm\" onclick=\"javasciprt: return confirm(\\'Yakin Ingin hapus data ?\\')\"'); "
   . "\n\t\t\t\t?>"
   . "\n\t\t\t</td>";

$string .=  "\n\t\t</tr>
           <?php
       }
       ?>
       </tbody>
       <tfoot>
           
           </tfoot>
   </table>

             </div>
           </div>
         </div>                       
       
       
       <div class=\"row\">
       <div class=\"col-md-6\">
           <a href=\"#\" class=\"btn btn-primary\" style=\"padding-left:20px;\">Total Data : <?php echo \$total_rows ?></a>";
if ($export_excel == '1') {
$string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/excel'), '<i class=\"fa fa-file-excel-o\"></i> Excel', 'class=\"btn btn-success btn-sm\"'); ?>";
}
if ($export_word == '1') {
$string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/word'), '<i class=\"fa fa-file-word-o\"></i> Word', 'class=\"btn btn-info btn-sm\"'); ?>";
}
if ($export_pdf == '1') {
$string .= "\n\t\t<?php echo anchor(site_url('".$c_url."/pdf'), 'PDF', 'class=\"btn btn-primary\"'); ?>";
}
$string .= "\n\t    </div>
       <div class=\"col-md-6 text-right\">
          <!-- <?php echo \$pagination ?> -->
       </div>

     </div>
     </div>
   </div>
   <!-- /page content -->

   ";
$hasil_view_list = createFile($string, $target."views/" . $v_list_file);

?>





   