<?php 

//================= Page is used to show admin withdraw requests of vendors=======================//
//================= Page is used to show admin withdraw requests of vendors=======================//
    if(!empty(get_option('wcmvp_withdraw_status')))
    {
        $wcmvp_withdraw_status = get_option('wcmvp_withdraw_status');
        if( isset($wcmvp_withdraw_status) && !empty($wcmvp_withdraw_status) )
        {
            ?>
                <input type="hidden" id="wcmvp_withdraw_active" value="<?php echo esc_attr( $wcmvp_withdraw_status ) ?>">
            <?php
        }
    } 
 
?>    

    <div class = "wcmvp_bulk_action">
        <div class = "wcmvp_prod_sorting" id="wcmvp-withdraw-sorting-tabs">
            <?php 
                $wcmvp_withdraw_sorting_tab = array(
                    "<a href = '#withdraw' data-value = 'pending' id = 'wcmvp_withdraw_pending' class = 'mdc-button mdc-button--raised mdc-theme--primary mdc-ripple-upgraded wcmvp_withdraw' >".esc_html__('Pending','wc-multi-vendor-platform-lite')."</a>",
                    
                    "<a href = '#withdraw' data-value = 'approved' id = 'wcmvp_withdraw_approved' class = 'mdc-button mdc-button--raised mdc-theme--primary mdc-ripple-upgraded wcmvp_withdraw' >".esc_html__('Approved','wc-multi-vendor-platform-lite')."</a>",
                    
                    "<a href = '#withdraw' data-value = 'cancelled' id = 'wcmvp_withdraw_cancelled' class = 'mdc-button mdc-button--raised mdc-theme--primary mdc-ripple-upgraded wcmvp_withdraw' >".esc_html__('Cancelled','wc-multi-vendor-platform-lite')."</a>"
                    
                );
                if( isset($wcmvp_withdraw_sorting_tab) && is_array($wcmvp_withdraw_sorting_tab) )
                {
                    $wcmvp_withdraw_sorting_tab = apply_filters('wcmvp_withdraw_sorting_tab',$wcmvp_withdraw_sorting_tab);

                    if( isset($wcmvp_withdraw_sorting_tab) && is_array($wcmvp_withdraw_sorting_tab) )
                    {
                        foreach($wcmvp_withdraw_sorting_tab  as $tabs)
                        {
                            if( isset($tabs) )
                            {
                                //========$tabs contains html=======//
                                echo $tabs;
                            }
                        }
                    }
                }
            ?>  
        </div>
        <div class='wcmvp_select_box'>
            <select name="action" id="wcmvp_withdraw_action" class="wcmvp-select-text">
                <option value = "wcmvp_not_selected"><?php esc_html_e( 'Bulk Actions','wc-multi-vendor-platform-lite' ); ?></option>
                <option value = "approved" class="wcmvp_withdraw_pending_page"><?php esc_html_e( 'Approve','wc-multi-vendor-platform-lite' ); ?></option>
                <option value = "cancelled" class="wcmvp_withdraw_pending_page"><?php esc_html_e( 'Cancel','wc-multi-vendor-platform-lite' ); ?></option>
                <option value = "pending" class="wcmvp_withdraw_cancel_page"><?php esc_html_e( 'Pending','wc-multi-vendor-platform-lite' ); ?></option>
                <option value = "delete"><?php esc_html_e( 'Delete','wc-multi-vendor-platform-lite' ); ?></option>
            </select>
            <button class="mdc-button mdc-button--outlined mdc-ripple-upgraded wcmvp_withdraw_apply_bulk wcmvp_add_new_prod" id="wcmvp_withdraw_apply_bulk">
                <span class="mdc-button__label wcmvp_label_text"><?php esc_html_e('Apply', 'wc-multi-vendor-platform-lite'); ?></span>
                <div class="mdc-button__ripple"></div>
            </button>   
        </div>
    </div>

        <table id="wcmvp_withdraw_table" class="wcmvp_withdraw_table mdl-data-table">
 
        <thead>
            <tr>
                <th class="mdc-data-table__cell mdc-data-table__cell--checkbox">
					<div class="mdc-checkbox mdc-data-table__row-checkbox">
						<input type="checkbox" class="mdc-checkbox__native-control wcmvp_withdraw_outer_checkbox" id="wcmvp-select-all-vendor-row" aria-labelledby="u0">
						<div class="mdc-checkbox__background">
						<svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
							<path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
						</svg>
						<div class="mdc-checkbox__mixedmark"></div>
                        </div>
                        <div class="mdc-checkbox__ripple"></div>
					</div>
				</th>
                <th><?php esc_html_e( 'Vendor','wc-multi-vendor-platform-lite' ); ?></th>
                <th><?php esc_html_e( 'Amount','wc-multi-vendor-platform-lite' ); ?></th>
                <th><?php esc_html_e( 'Status','wc-multi-vendor-platform-lite' ); ?></th>
                <th><?php esc_html_e( 'Method','wc-multi-vendor-platform-lite' ); ?></th>
                <th><?php esc_html_e( 'Details','wc-multi-vendor-platform-lite' ); ?></th>
                <th><?php esc_html_e( 'Note','wc-multi-vendor-platform-lite' ); ?></th>
                <th><?php esc_html_e( 'Date','wc-multi-vendor-platform-lite' ); ?></th>
                <th><?php esc_html_e( 'Actions.','wc-multi-vendor-platform-lite' ); ?></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th class="mdc-data-table__cell mdc-data-table__cell--checkbox">
					<div class="mdc-checkbox mdc-data-table__row-checkbox">
						<input type="checkbox" class="mdc-checkbox__native-control wcmvp_withdraw_outer_checkbox" id="wcmvp-select-all-vendor-row" aria-labelledby="u0">
						<div class="mdc-checkbox__background">
						<svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
							<path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
						</svg>
						<div class="mdc-checkbox__mixedmark"></div>
                        </div>
                        <div class="mdc-checkbox__ripple"></div>
					</div>
				</th>
                <th><?php esc_html_e( 'Vendor','wc-multi-vendor-platform-lite' ); ?></th>
                <th><?php esc_html_e( 'Amount','wc-multi-vendor-platform-lite' ); ?></th>
                <th><?php esc_html_e( 'Status','wc-multi-vendor-platform-lite' ); ?></th>
                <th><?php esc_html_e( 'Method','wc-multi-vendor-platform-lite' ); ?></th>
                <th><?php esc_html_e( 'Details','wc-multi-vendor-platform-lite' ); ?></th>
                <th><?php esc_html_e( 'Note','wc-multi-vendor-platform-lite' ); ?></th>
                <th><?php esc_html_e( 'Date','wc-multi-vendor-platform-lite' ); ?></th>
                <th><?php esc_html_e( 'Actions.','wc-multi-vendor-platform-lite' ); ?></th>
            </tr>
        </tfoot>
    </table> 

    <div class='wcmvp-modal' id='wcmvp_withdraw_add_note' tabindex="-1">
		<div class='wcmvp-modal-dialog wcmvp_modal_dialog'>
			<div class='wcmvp-modal-content'>

				<div class='wcmvp-modal-header'>
					<h4 class='wcmvp-modal-title'><?php esc_html_e('Add Note', 'wc-multi-vendor-platform-lite'); ?></h4>
                    <button class='mdc-button wcmvp-modal-close'>
                        <i class="material-icons wcmvpvsm-list-item" aria-hidden="true"><?php echo esc_html('highlight_off'); ?></i>
                    </button>
                </div>
                
				<div class='wcmvp-modal-body'>
					<div class="wcmvp-section-content card min-width-100">
						<div clas="wcmvp-setting-heading">
							<div class="wcmvp-subsetting-content">
								<textarea rows="6" cols="62" id="wcmvp_withdraw_add_note_text"></textarea>
							</div>

						</div>
					</div>
				</div>

				<!-- Modal footer -->
				<div class='wcmvp-modal-footer'>
					<button type='button' class='mdc-button mdc-button--raised mdc-ripple-upgraded wcmvp_withdraw_add_note_btn' data-id=''><?php esc_html_e('Update Note', 'wc-multi-vendor-platform-lite'); ?> </button>
				</div>

			</div>
		</div>
	</div>