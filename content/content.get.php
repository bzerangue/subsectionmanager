<?php

/**
 * @package content
 */
require_once TOOLKIT . '/class.administrationpage.php';
require_once TOOLKIT . '/class.sectionmanager.php';
require_once TOOLKIT . '/class.entrymanager.php';
require_once EXTENSIONS . '/subsectionmanager/lib/class.subsectionmanager.php';

class contentExtensionSubsectionmanagerGet extends AdministrationPage {
    /**
     * Used to fetch subsection items via an AJAX request.
     */
    public function viewIndex(): void {
        $subsection = new SubsectionManager();

        // Set flags
        $flags = SubsectionManager::GETHTML;
        if (!isset($_GET['entry'])) {
            $flags |= SubsectionManager::GETALLITEMS;
        }

        // Get items
        $content = $subsection->generate(
            (int) $_GET['id'],
            (int) $_GET['section'],
            isset($_GET['entry']) ? (int) $_GET['entry'] : null,
            0,
            $flags
        );

        echo $content['html'];
        exit;
    }
}
