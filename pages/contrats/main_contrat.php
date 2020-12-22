<div class="col-md-12">

        
        <div class="col-md-12">
            <div class=" col-md-3">
                <a href="?p=contrat.all" type="button" class="btn btn-xs btn-success">Tous les contrats 
                    <span style="font-style: italic;">
                        (<?= $contrat->total_actif()->total_contrat ?>)
                    </span>
                </a>
            </div>

            <div class=" col-md-3">
                <a href="?p=contrat.list_encours" type="button" class="btn btn-xs btn-success">En cours  
                    <span style="font-style: italic;">
                        (<?= $contrat->total_contrat_en_cours()->total_contrat_en_cours ?>)
                    </span>
                </a>
            </div>
            <div class=" col-md-3">
                <a href="?p=contrat.list_expirant_3_mois" type="button" class="btn btn-xs btn-warning">
                    Echéant en moin de trois mois
                    <span style="font-style: italic;">
                        (<?= $contrat->total_contrat_echeant_dans_trois_mois()->total_contrat_echeant_dans_trois_mois ?>)
                    </span>
                </a>
            </div>
            <div class=" col-md-3">
                <a href="?p=contrat.list_echue" type="button" class="btn btn-xs btn-danger">
                    Echus
                    <span style="font-style: italic;">
                        (<?= $contrat->total_contrat_echu()->total_contrat_echu ?>)
                    </span>
                </a>
            </div>
        </div>
        <div class="col-md-12" style="margin-bottom: 20px;"></div>
    </div>