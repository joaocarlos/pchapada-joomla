<?php
/**
 * @version    $Id: index.php 21720 2011-07-01 08:31:15Z chdemko $
 * @package    Joomla.Site
 * @copyright  Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/* The following line loads the MooTools JavaScript Library */
JHtml::_('behavior.framework', true);

/* The following line gets the application object for things like displaying the site name */
$app = JFactory::getApplication();
?>
<!doctype html>

<html lang="pt-br">

<head id="portaldachapada.uefs.br">
  <jdoc:include type="head" />
  
  <!-- CSS: screen, mobile & print are all in the same file -->
  <link type="text/css" rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/bootstrap.css">
  <link type="text/css" rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/bootstrap-responsive.css">
  <link type="text/css" rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/pchapada.css">

  <!--<link type="text/css" rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/style.css">
  <link type="text/css" rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/site.css">  
  <link type="text/css" rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/tablecloth.css">-->
   
  <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/modernizr-1.7.min.js"></script>
  <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/tablecloth.js"></script>
  <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/jquery-1.6.2.min.js"></script>
  <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/jquery-ui-1.8.16.custom.min.js"></script>

  <script>
  // JQuery UI Accordion call script
  $(function() {
    $( "#menu-accordion" ).accordion({
      autoHeight: false,
      navigation: true
    });
  });
  
  </script>


</head>
  <body>
    <div class="uefs-top-bar"><span class="uefs-top-text"><a href="http://www.uefs.br/portal" target="_blank" title="Portal da UEFS">Universidade Estadual de Feira de Santana</a></span></div>
	<header>
    	<div class="container header">
		    <h1>Portal da Chapada Diamantina</h1>
		    <div class="row">
		    <?php if($this->countModules('topmenu')) : ?>

		    <nav class="navigation span6">
		    	<jdoc:include type="modules" name="topmenu" />   
		    </nav>   

		    <?php endif; ?> 
		    <?php if($this->countModules('search')) : ?>

		        <jdoc:include type="modules" name="search" />
		        
		    <?php endif; ?>	 
		    </div>       
      	</div>            
	</header>	

    <div class="portal"> 				
 		<?php if($this->countModules('banner')) : ?>
	  		<jdoc:include type="modules" name="banner" />
		<?php endif; ?> 
			<div class="row">
    		
    			<?php if($this->countModules('mainmenu')) : ?>
        		
        			<nav class="span3 navigation">
        				<div id="menu-accordion" class="site-menu">
          					<jdoc:include type="modules" name="mainmenu" style="XHTMLlinkedMenu" headerLevel="3" />
          				</div>  	    
        			</nav>
	    		<?php endif; ?>      
	    		
	    		<div id="content" class="span7">
		     		<!-- Place this tag where you want the +1 button to render -->
		       		<!--<div class="g-plusone" data-annotation="none"></div>-->          
		       		<?php if($this->countModules('breadcrumb')) : ?>
		           		<jdoc:include type="modules" name="breadcrumb" />
		       		<?php endif; ?>   

		       		<div id="portal-content" class="wrap"> 
  
				        <?php if($this->countModules('about')) :?>          
				        	<jdoc:include type="modules" name="about" />            
				        <?php else : ?>          
				        	<jdoc:include type="component" />
				    	<?php endif; ?>

			        </div>
			        <?php if($this->countModules('joinus') | $this->countModules('newsofportal')) : ?>

					    <div class="row">
					       	<?php if($this->countModules('joinus')) : ?>

					        	<!-- Join us custom component -->
						        <div class="wrap span7">
						        	<jdoc:include type="modules" name="joinus" />  
						        </div>

					        <?php endif; ?>
					        <?php if($this->countModules('newsofportal')) : ?>

					            <!-- News froom custom component -->
					            <div class="wrap span6">	              	
					            	<jdoc:include type="modules" name="newsofportal" style="xhtml" />  	            	
					           	</div>            

					        <?php endif; ?>
					    </div>

			        <?php endif; ?> 			        
			       	
			       	<?php if($this->countModules('related')) : ?>
				    
				        <div id="portal-related">
				        	<!-- Join us custom component -->
				           	<div id="related" class="wrap span6">
				           		<h2>Conteúdo relacionado</h2>
				           		<jdoc:include type="modules" name="related" style="xhtml" />  
				           	</div>
				        </div>          
			       	
			       	<?php endif; ?>
	        	</div>
	        </div>
	</div>                
	<footer class="row-fluid">
		<div class="container-fluid">
			<div class="divisor span4 offset1 last-div">
		        <h2>Novidades e Atualizações</h2>
		        <?php if($this->countModules('newsfeed')) : ?>
		          <jdoc:include type="modules" name="newsfeed" />
		        <?php else : ?>
		          <p>Neste espaço deve ser adicionado o módulo que apresenta as últimas adições do Portal.</p>
		        <?php endif; ?>  
		    </div>
		    <div class="divisor span3">
		        <h2>Mais Visitadas</h2>
		        <?php if($this->countModules('popular')) : ?>
		          <jdoc:include type="modules" name="popular" />
		        <?php else : ?>
		          <p>Neste espaço deve ser adicionado o módulo que apresenta as páginas mais visitadas do Portal.</p>
		        <?php endif; ?>  
		    </div>  
		    <div class="divisor span3">
		        <h2>Tags</h2>
		        <?php if($this->countModules('tags')) : ?>
		          <jdoc:include type="modules" name="tags" />
		        <?php else : ?>
		          <p>Neste espaço deve ser adicionado o módulo que apresenta as páginas mais visitadas do Portal.</p>
		        <?php endif; ?>  
		    </div>
		</div>
	</footer>
	
	<footer id="institucional" class="row-fluid">
		<div class="container-fluid">
			<div class="span4 offset2 divisor">
		        <h2>Financiamento</h2>
		        <div id="fapesb"><a href="http://www.fapesb.ba.gov.br/" title="FAPESB" target="_blank"><img style="margin-top: 20px" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/images/financiamento.png" title="Fundação de Amparo à Pesquisa do Estado da Bahia" /></a></div>
		    </div>
		    <div class="span4 divisor">
		        <h2>Redes Sociais</h2>
		        <div id="social"><img style="margin-top: 20px" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/images/facebook.png" title="Portal da Chapada Diamantina no Facebook" /></div>
		    </div>
	    </div>
	    <?php if($this->countModules('footer')) : ?>
	    <div id="copy">
	        <jdoc:include type="modules" name="footer" />                
	    </div>
	    <?php endif; ?>
	</footer>
	<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/bootstrap.js"></script>
</body>
</html>