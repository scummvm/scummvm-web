<?

/*
 * Documentation Page for ScummVM
 * by Jeremy Newman <jnewman@dracowulf.com>
 *
 */

// set this for position of this file relative
$file_root = ".";

// load libraries
require($file_root."/include/"."incl.php");

// start of html
html_header("ScummVM");
sidebar_start();

//display News
echo html_round_frame_start("ScummVM Documentation","98%","",20);
echo html_frame_start("","100%",1,1);

if ($view and file_exists($file_root."/docs/".$view.".xml"))
{
    echo html_frame_tr(html_frame_td(display_xml($file_root."/docs/".$view.".xml",'BODY').html_p()));
}
else
{
    // intro
    echo html_frame_tr(
                html_frame_td(
                              html_b("Documentation").html_br().
                              html_line().html_br(2)
                             )
                      );

    // get list of documentation items
    $docs = get_files($file_root."/docs","xml");
    sort($docs);
    
    // loop and display docs
    $c = 0;
    while (list($key,$item) = each($docs))
    {
        $c++;
        list($file,$ext) = split("\.",$item,2);
        echo html_frame_tr(
                    html_frame_td(
                                  html_ahref(display_xml($file_root."/docs/".$item,'NAME'),"$PHP_SELF?view=$file").html_br().
                                  display_xml($file_root."/docs/".$item,'DESC').html_br(2)."\n"
                                 )
                          );
    } // end of docs loop
    
    // outro
    echo html_frame_tr(
                html_frame_td(
                              html_line().html_p("Click the title of the section of the documentation you want to read.")
                             )
                      );    
    
}

echo html_frame_end();
echo html_round_frame_end("&nbsp;");
//end of docs display

// end of html
echo html_p();
sidebar_end();
html_footer();

?>
