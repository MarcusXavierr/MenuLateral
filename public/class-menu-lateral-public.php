<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       não-possui
 * @since      1.0.0
 *
 * @package    Menu_Lateral
 * @subpackage Menu_Lateral/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Menu_Lateral
 * @subpackage Menu_Lateral/public
 * @author     Marcus Xavier <marcusxavierr123@gmail.com>
 */
class Menu_Lateral_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Menu_Lateral_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Menu_Lateral_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/menu-lateral-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Menu_Lateral_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Menu_Lateral_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/menu-lateral-public.js', array( 'jquery' ), $this->version, false );

	}

	public function line_before_header(){
		$url_atual = get_permalink();
		
		?>
		<link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
		<link rel="stylesheet" href="wp-content/plugins/menu-lateral/public/css/menu-lateral-public.css">
		
		
		<div class="imondelli-column" >
			<div class="padd" id="largura">
				<div class="imondelli-left" id="container">
				<div></div>
				<button onclick="esconder_mostrar()" class="imondelli-button" id="imondelli-button"> <i class="fas fa-bars fa-xs"></i> </button>
				<a href="https://www.facebook.com/instituto.mondelli/" class="link" target="_blank"><i class="fab fa-facebook-f icon-padd"></i></a>
				<a href="https://www.instagram.com/institutomondelli/" class="link" target="_blank"><i class="fab fa-instagram icon-padd"></i></a>
				<a href="https://www.youtube.com/channel/UCeFYDwgRJ2hVwaNHecHZSbQ" class="link" target="_blank"><i class="fab fa-youtube icon-padd"></i></a>
				<a href="https://br.linkedin.com/in/instituto-mondelli-de-odontologia-a43135188" class="link" target="_blank"><i class="fab fa-linkedin-in icon-padd"></i></a>
				</div>
			
				<div class="imondelli-right	">
				<!-- Later add a link for those links -->
					<a href="https://imondelli.com/cadastro/" class="link icon-padd" style="font-size:13px" target="_blank">Fale conosco</a>
					<a href="https://api.whatsapp.com/send?phone=5514997300618&text=&source=&data=" class="link icon-padd"  style="font-size:13px" target="_blank">Ouvidoria</a>
				   
				</div>
				<div class="imondelli-center">
				<?php echo do_shortcode('[gtranslate]'); ?>
				</div>
			</div>
		</div>  
	
		<script>
			function esconder_mostrar() {
			var x = document.getElementById("menu_lateral");
			if (x.style.display == "none") {
				x.style.display = "block";
			} else {
				x.style.display = "none";
			}
			}
	</script>                  
		<?php
		}
		
		
	
		//Barra Lateral
	
		public function barra_lateral(){?>
	
		<div id="menu_lateral" style="display:none">
			<div class="menu_lateral">
				<div class="sidebar-main">
					<aside id="nav_menu-2" class="widget widget_nav_menu"><h2 class="widget-title titulo ">Mais sobre nós</h2>
						<div class="menu-menu-container">
						<ul id="menu-menu" class="menu">
							<li id="menu-item-1499" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1499"><a href="https://imondelli.com/nossas-publicacoes/" class="link link_menu">Nossas publicações</a></li>
							<li id="menu-item-1500" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1500"><a href="https://imondelli.com/eventos/" class="link link_menu">Eventos</a></li>
							<li id="menu-item-1501" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1501"><a href="https://imondelli.com/sucursais/" class="link link_menu">Sucursais</a></li>
							<li id="menu-item-1502" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1502"><a href="https://imondelli.com/blog/" class="link link_menu">Blog</a></li>
							<li id="menu-item-1503" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1503"><a href="https://imondelli.com/cadastro/" class="link link_menu">Cadastro</a></li>
							<li id="menu-item-1504" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1504"><a href="https://imondelli.com/filosofia-toi/" class="link link_menu">Filosofia TOI</a></li>
						</ul>
						</div>
					</aside>
				</div>
			</div>
		</div>
	
		<?php 
		}
		
		public function __construct( $plugin_name, $version ) {

			$this->plugin_name = $plugin_name;
			$this->version = $version;
			add_action('wp_head',array( $this, 'line_before_header' ));
			add_action('astra_primary_content_top',array( $this, 'barra_lateral' ));
	
		}

}
