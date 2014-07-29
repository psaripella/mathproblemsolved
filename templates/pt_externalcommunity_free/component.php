<?php
// no direct access
defined('_JEXEC') or die;
$app   = JFactory::getApplication();
$doc   = JFactory::getDocument();
$this->language = $doc->language;
$this->direction = $doc->direction;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
<jdoc:include type="head" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/template_css.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/template_css2.css" type="text/css" />
</head>
<body class="contentpane">
<jdoc:include type="message" />
<jdoc:include type="component" />
</body>
</html>
