/**
 * Abivia Super Table Plus Plugin.
 *
 * @package AbiviaSuperTable
 * @copyright (C) 2011-2012 by Abivia Inc. All rights reserved.
 * @license GNU/GPL
 * @link http://www.abivia.net/
 */

jQuery(function() {
    var b = 'supertable-';
    var ba = b + 'active';
    var db = '.' + b;
	var tablesRow = jQuery(db + 'rowmode');
	var highlightRow = new Array();
    // Auto height adjustment
	tablesRow.each(function(tableInd, table) {
		var rows = jQuery(table).find(db + 'row');
		rows.each(function(rowInd, row) {
            var max = 0;
            var cols = jQuery(row).find(db + 'cell');
            cols.each(function(colInd, col) {
                max = Math.max(max, jQuery(col).height());
            });
            cols.each(function(colInd, col) {
                jQuery(col).height(max);
            });
        });
    });
	tablesRow.each(function(tableInd, table) {
        if (jQuery(table).hasClass(b + 'inactive')) {
            return;
        }
		var rows = jQuery(table).find(db + 'row');
		rows.each(function(rowInd, row) {
			if (jQuery(row).hasClass(ba)) {
				highlightRow[tableInd] = rowInd;
			}
            if (!jQuery(row).hasClass(b + 'row-head')) {
                jQuery(row).bind({
                    'mouseenter': function() {
                        jQuery(rows).removeClass(ba);
                        jQuery(this).addClass(ba);
                    }
                });
            }
		});
		var headrows = jQuery(table).find(db + 'row-head');
		headrows.each(function(rowInd, row) {
			jQuery(row).bind({
				'mouseleaave': function() {
					jQuery(rows).removeClass(ba);
					jQuery(table).find(db + 'row')[highlightRow[tableInd]]
                        .addClass(ba);
				}
			});
		});
		if (highlightRow[tableInd] !== undefined) {
			jQuery(table).bind('mouseleave', function() {
				jQuery(table).find(db + 'row').removeClass(ba);
				jQuery(jQuery(table).find(db + 'row')[highlightRow[tableInd]])
                    .addClass(ba);
			});
		}
	});
});
