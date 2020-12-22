<div class="col-md-12">

    <div class="col-md-2"></div>
    <div class="col-md-12">
        <div class=" col-md-3">
            <a href="?p=intervention.all" type="button" class="btn btn-sm  orange_inverse">Toutes les interventions 
                <span style="font-style: italic;">
                    (<?= $tableIntervention->total_actif()->total_intervention ?>)
                </span>
            </a>
        </div>

        <div class=" col-md-3">
            <a href="?p=intervention.list_realisee" type="button" class="btn btn-sm  btn-success">Interventions réalisées
                <span style="font-style: italic;">
                    (<?= $tableIntervention->total_realise()->total_realise ?>)
                </span>
            </a>
        </div>
        
        <div class=" col-md-3">
            <a href="?p=intervention.list_mois_courant" type="button" class="btn btn-sm  btn-success">
                Interventions du mois
                <span style="font-style: italic;">
                    (<?= $tableIntervention->total_mois_courant()->total_mois_courant ?>)
                </span>
            </a>
        </div>

        <div class=" col-md-3">
            <a href="?p=intervention.list_a_venir" type="button" class="btn btn-sm  orange_inverse">
                Interventions à venir
                <span style="font-style: italic;">
                    (<?= $tableIntervention->total_a_venir()->total_a_venir ?>)
                </span>
            </a>
        </div>
    </div>
    <div class="col-md-2"></div>
    <div class="col-md-12" style="margin-bottom: 20px;"></div>
</div>