<div class="content-faq">
    <div class="container">
        <div class="row">
            
                <div class="title-group">
					<h1>Customer Service</h1>
                </div>
            <div class="col-sm-8 col-sm-offset-2">
                <?php
                    if(have_rows('faq_information')){
                        while(have_rows('faq_information')){
                            the_row();
                            echo "<p class='title'>".get_sub_field('faq_title')."</p>";
                            echo "<p>".get_sub_field('faq_description')."</p>";
                        }
                    }
                ?>
                 <br/>
            </div>
           
        </div>
    </div>
</div>