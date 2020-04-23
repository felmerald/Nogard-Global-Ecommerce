<div class="container">
    <div class="row">
        <div class="title-group">
			<h1>STORE DIRECTORY</h1>
		</div>
    </div>
</div>
<div class="directory-store">
    <div class="container">
        <div class="row">
               
                    <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>Store Name</th>
                                <th>Store Address</th>
                                <th>Google Map Link</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                                if(have_rows('st_directory')):
                                    while(have_rows('st_directory')):
                                        the_row();
                        ?>
                                            <tr>
                                                <td><?php echo get_sub_field('st_store_name'); ?></td>
                                                <td><?php echo get_sub_field('st_store_address'); ?></td>
                                                <td><a href="<?php echo esc_url(get_sub_field('st_google_map_link')); ?>" target="_blank"><i class="fas fa-map-marked-alt"></i> Map</a></td>
                                            </tr>
                                            <?php
                                    endwhile;
                                endif;
                            ?>
                            
                        </tbody>
                    </table>

                
        </div>
    </div>
</div>
