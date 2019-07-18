<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="section-title p-0">Livraison</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="container">
                    <div class="page-title p-2">
                        <p>Merci de renseigner une adresse d'expédition</p>
                    </div>
            
                    <div class="row">
                        <div class="col-12 mb-3">
                            {{ Form::open(['action' => 'ClientOrdersController@place', 'method' => 'POST', 'id' => 'payment-form']) }}
                                <div class="form-group">
                                    {{ Form::label('name', 'Nom et prénom :') }}
                                    {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Nom et prénom']) }}
                                </div>
                                
                                <div class="form-group">
                                    {{ Form::label('address1', 'Adresse ligne 1 :') }}
                                    {{ Form::text('address1', '', ['class' => 'form-control', 'placeholder' => 'Rue, voie, boîte postale']) }}
                                </div>
            
                                <div class="form-group">
                                    {{ Form::label('address2', 'Adresse ligne 2 :') }}
                                    {{ Form::text('address2', '', ['class' => 'form-control', 'placeholder' => 'Bâtiment, étage, lieu-dit']) }}
                                </div>
            
                                <div class="form-group">
                                    {{ Form::label('postcode', 'Code postal :') }}
                                    {{ Form::text('postcode', '', ['class' => 'form-control', 'placeholder' => 'Code postal']) }}
                                </div>
            
                                <div class="form-group">
                                    {{ Form::label('city', 'Ville :') }}
                                    {{ Form::text('city', '', ['class' => 'form-control', 'placeholder' => 'Ville']) }}
                                </div>

                                {{ Form::submit('Livrer à cette adresse', ['class' => 'btn btn-success d-block mx-auto']) }}
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>