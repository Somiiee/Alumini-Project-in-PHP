 <!-- Masthead-->
    <header class="masthead">
            <div class="container-fluid h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8  mb-4 page-title">
                        <h2 class="text-white">About us</h2>
                        <hr class="divider my-4" />

                    <div class="col-md-12 mb-2 justify-content-center">
                    </div>                        
                    </div>
                    
                </div>
            </div>
        </header>

    <section class="page-section">
        <div class="container">
    <?php echo html_entity_decode($_SESSION['system']['about_content']); ?>  
            
        </div>
        </section>