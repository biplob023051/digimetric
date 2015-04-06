<?php

function read_file_docx($filename) {

    $striped_content = '';
    $content = '';

    if (!$filename || !file_exists($filename))
        return false;

    $zip = zip_open($filename);

    if (!$zip || is_numeric($zip))
        return false;

    while ($zip_entry = zip_read($zip)) {

        if (zip_entry_open($zip, $zip_entry) == FALSE)
            continue;

        if (zip_entry_name($zip_entry) != "word/document.xml")
            continue;

        $content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));

        zip_entry_close($zip_entry);
    }// end while

    zip_close($zip);

    //echo $content;
    //echo "<hr>";
    //file_put_contents('1.xml', $content);     

    $content = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $content);
    $content = str_replace('</w:r></w:p>', "\r\n", $content);
    $striped_content = strip_tags($content);

    return $striped_content;
}
function extract_email_address ($string) {
    foreach(preg_split('/\s/', $string) as $token) {
        $email = filter_var(filter_var($token, FILTER_SANITIZE_EMAIL), FILTER_VALIDATE_EMAIL);
        if ($email !== false) {
            $emails[] = $email;
        }
    }
    return $emails;
}
if (isset($_POST['docxsubmit'])) {
//    echo "<pre>";
//    print_r($_FILES);
//    echo "</pre>";
    $data = read_file_docx($_FILES['docx']['tmp_name']);
//    echo "<pre>";
//    print_r($data);
//    echo "</pre>";
    echo "<pre>";
    print_r(extract_email_address($data));
    echo "</pre>";
    
}
?>
<html>
    <head></head>
    <title>Demo Docx file read</title>
    <body>
        <form action="" name="docxread" method="post" enctype="multipart/form-data">
            <input type="file" name="docx" value="" />
            <input type="submit" name="docxsubmit" value="Submit">
        </form>
    </body>
</html>
