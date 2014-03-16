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
			$tabs[__('Descriptive / Administrative Metadata')] = $this->_descAdminForm($item);			
			$tabs[__('Original Copy Metadata')] = $this->_origCopyForm($item); */
			$tabs[__('Vendor Metadata')] = $this->_vendorForm($item); */
			
			return $tabs;
        }
		
		protected function _descAadminForm($item)
		{
			
			$elementsTable = get_db()->getTable('Element');
             
            $elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Institution');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Institution URL');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Institution Call Number');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Title');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Additional Title');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Series Title');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Label');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Description or Content Summary');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Why is this important to California history?');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Date Created');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Date Published');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Country of Creation');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Director');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Interviewer');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Performer');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Producer');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Camera');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Cast');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Editor');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Interviewee');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Music');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Sound');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Speaker');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Publisher');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Distributor');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Copyright Statement');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Language');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Subject Topic');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Subject Entity');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Spatial Coverage');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Temporal Coverage');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Genre');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Cataloger Notes');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Additional Descriptive Notes for Work');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Additional Technical Notes for Work');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Collection Guide Title');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Collection Guide URL');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Internet Archive URL');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Object Identifier');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Project Identifier');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Asset Type');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Object ARK');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Institution ARK');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'CAVPP Quality Control Notes');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Partner Quality Control Notes');			
			
			$html = element_form($elements,$item);
			
			return $html;
		}
		
		protected function _origCopyForm($item)
		{
			
			$elementsTable = get_db()->getTable('Element');

            $elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Generation (original copy)');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Format (original copy)');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Extent (original copy)');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Duration (original copy)');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Running Speed (original copy)');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Timecode Content Begins (original copy)');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Track Standard (original copy)');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Channel Configuration (original copy)');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Stock Manufacturer (original copy)');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Base Type (original copy)');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Transcript (original copy)');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Silent or Sound (original copy)');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Color and/or Black and White (original copy)');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Aspect Ratio (original copy)');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Subtitles (original copy)');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Intertitles (original copy)');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Closed Captions (original copy)');
			
			$html = element_form($elements,$item);
			
			return $html;
		}
		
		protected function _vendorForm($item)
		{
			
			$elementsTable = get_db()->getTable('Element');

            $elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Digital File Identifier(s) (vendor copy)');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Creation Date (vendor copy)');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Frame Size (vendor copy)');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'File Extension (vendor copy)');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Standard and File Wrapper (vendor copy)');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'File Location (vendor copy)');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Media Type (vendor copy)');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Generations (vendor copy)');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Preservation Filesize');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Access Filesize');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Duration (vendor copy)');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Colors (vendor copy)');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Tracks (vendor copy)');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Channel Configuration (vendor copy)');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Track Type (vendor copy)');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Encoder (vendor copy)');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Sampling Rate (preservation copy)');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Data Rate (preservation copy)');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Frame Rate (preservation copy)');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Bit Depth  (preservation copy)');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Data Compression (preservation copy)');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Sampling Rate (access copy)');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Data Rate (access copy)');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Frame Rate (access copy)');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Bit Depth  (access copy)');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Data Compression (access copy)');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Relationship/Transfer/Vendor/Creation Date');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Preservation File Identifier/MD5/MD5 Date');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Access File Identifier/MD5/MD5 Date');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Creating Application/Version (vendor copy)');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Source Deck Manufacturer/Model (vendor copy)');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Digitizer Manufacturer/Model (vendor copy)');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Technical Evaluation Report');
			$elements[] = $elementsTable->findByElementSetNameAndElementName('CAVPP_PBCore', 'Vendor Quality Control Notes');

			$html = element_form($elements,$item);
			
			return $html;
		}		
		
	}
