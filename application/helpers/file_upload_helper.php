<?php
/*
	*------------------------------------
	* returns the uploaded image url
	*------------------------------------
	*/
function uploadImage()
{
	$type = explode('.', $_FILES['photo']['name']);
	$type = $type[count($type) - 1];
	$url = 'uploads/images/categories/' . uniqid(rand()) . '.' . $type;
	if (in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
		if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
			if (move_uploaded_file($_FILES['photo']['tmp_name'], $url)) {
				return $url;
			} else {
				return false;
			}
		}
	}
}


?>
