<?php

    class CAVPP_MetadataTabsPlugin extends Omeka_Plugin_AbstractPlugin
    {
        protected $_filters = array(
               'admin_items_form_tabs'
              );

        public function filterAdminItemsFormTabs($tabs, $args)
        {
			unset($tabs['Dublin Core']);
			unset($tabs['Item Type Metadata']);
			unset($tabs['PBCore']);
			
			$item = $args['item'];
			/* $tabs[__('Physical Instantiation')] = $this->_physinstForm($item); */
			/* $tabs[__('Vendor Data')] = $this->_vendorForm($item); */
			$tabs[__('Admin Data')] = $this->_adminForm($item);			
			
			return $tabs;
        }
		
	
		/**
		* Each time we save an item, post it to the Internet Archive.
		*
		* @return void
		*/
		/* 
		private function _beamia_form()
		{
			$item = get_current_record('item');

			$output = '';

			$output .= '<div>' . __("If the box at the bottom of the files tab is checked, the files in this item, along with their metadata, will upload to the Internet Archive upon save.") . '</div><br />' . PHP_EOL;
			$output .= '<div>' . __("Note that BeamMeUp may make saving an item take a while, and that it may take additional time for the Internet Archive to post the files after you save.") . '</div><br />' . PHP_EOL;
			$output .= '<div>' . __("To change the upload default or to alter the upload's configuration, visit the plugin's configuration settings on this site.") . '</div><br />' . PHP_EOL;
			$output .= $this->_warnAccountConfiguration();
			if (metadata($item, 'id') == '') {
				$output .= '<div>' . __('Please revisit this tab after you save the item to view its Internet Archive links.') . '</div><br />' . PHP_EOL;
			}
			else {
				$output .= $this->_listInternetArchiveLinks($item, true);
				$output .= $this->_listInternetArchiveLinksForFiles($item);
			}

			return $output;
		} 
		*/
	
		protected function _adminForm($item)
		{
			
			$elementsTable = get_db()->getTable('Element');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('PBCore', 'Title');
             
            $elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Institution');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Institution URL');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Institution Call Number');
			
			$html = element_form($elements,$item);
			
			return $html;
		}
		
		/* 
		protected function _mapForm($item, $label = 'Find a Location by Address:', $confirmLocationChange = true,  $post = null)
		{
			$html = '';
			$label = __('Find a Location by Address:');
			$center = $this->_getCenter();
			$center['show'] = false;

			$location = $this->_db->getTable('Location')->findLocationByItem($item, true);

			if ($post === null) {
				$post = $_POST;
			}

			$usePost = !empty($post) && !empty($post['geolocation']);
			if ($usePost) {
				$lng  = (double) @$post['geolocation']['longitude'];
				$lat  = (double) @$post['geolocation']['latitude'];
				$zoom = (int) @$post['geolocation']['zoom_level'];
				$addr = @$post['geolocation']['address'];
			} else {
				if ($location) {
					$lng  = (double) $location['longitude'];
					$lat  = (double) $location['latitude'];
					$zoom = (int) $location['zoom_level'];
					$addr = $location['address'];
				} else {
					$lng = $lat = $zoom = $addr = '';
				}
			}

			$html .= '<div class="field">';
			$html .=     '<div id="location_form" class="two columns alpha">';
			$html .=         '<input type="hidden" name="geolocation[latitude]" value="' . $lat . '" />';
			$html .=         '<input type="hidden" name="geolocation[longitude]" value="' . $lng . '" />';
			$html .=         '<input type="hidden" name="geolocation[zoom_level]" value="' . $zoom . '" />';
			$html .=         '<input type="hidden" name="geolocation[map_type]" value="Google Maps v' . GOOGLE_MAPS_API_VERSION . '" />';
			$html .=         '<label>' . html_escape($label) . '</label>';
			$html .=     '</div>';
			$html .=     '<div class="inputs five columns omega">';
			$html .=          '<div class="input-block">';
			$html .=            '<input type="text" name="geolocation[address]" id="geolocation_address" value="' . $addr . '" class="textinput"/>';
			$html .=            '<button type="button" style="float:none;" name="geolocation_find_location_by_address" id="geolocation_find_location_by_address">'.__('Find').'</button>';
			$html .=          '</div>';
			$html .=     '</div>';
			$html .= '</div>';
			$html .= '<div  id="omeka-map-form" style="width: 100%; height: 300px"></div>';


			$options = array();
			$options['form'] = array('id' => 'location_form',
					'posted' => $usePost);
			if ($location or $usePost) {
				$options['point'] = array('latitude' => $lat,
						'longitude' => $lng,
						'zoomLevel' => $zoom);
			}

			$options['confirmLocationChange'] = $confirmLocationChange;

			$center = js_escape($center);
			$options = js_escape($options);

			$js = "var anOmekaMapForm = new OmekaMapForm(" . js_escape('omeka-map-form') . ", $center, $options);";
			$js .= "
				jQuery(document).bind('omeka:tabselected', function () {
					anOmekaMapForm.resize();
				});
			";

			$html .= "<script type='text/javascript'>" . $js . "</script>";
			return $html;
		}
		*/

	
	}
