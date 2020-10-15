<?php

namespace Database\Seeders;

use App\Models\Blog\Category\Category_region;
use Illuminate\Database\Seeder;

class Category_regionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $PACA = new Category_region();
        $PACA->pays_id ="1";
        $PACA->title ="Provence-Alpes-Côtes d'Azur";
        $PACA->save();

        $AuvergneRhoneAlpes = new Category_region();
        $AuvergneRhoneAlpes->pays_id ="1";
        $AuvergneRhoneAlpes->title ="Auvergne-Rhône-Alpes";
        $AuvergneRhoneAlpes->save();

        $Occitanie = new Category_region();
        $Occitanie->pays_id ="1";
        $Occitanie->title ="Occitanie";
        $Occitanie->save();

        $NouvelleAquitaine = new Category_region();
        $NouvelleAquitaine->pays_id ="1";
        $NouvelleAquitaine->title ="Nouvelle-Aquitaine";
        $NouvelleAquitaine->save();

        $bourgogneFrancheComte = new Category_region();
        $bourgogneFrancheComte->pays_id ="1";
        $bourgogneFrancheComte->title ="Bourgogne-Franche-Comté";
        $bourgogneFrancheComte->save();

        $paysDeLaLoire = new Category_region();
        $paysDeLaLoire->pays_id ="1";
        $paysDeLaLoire->title ="Pays-de-la-Loire";
        $paysDeLaLoire->save();

        $normandie = new Category_region();
        $normandie->pays_id ="1";
        $normandie->title ="Normandie";
        $normandie->save();

        $ileDeFrance = new Category_region();
        $ileDeFrance->pays_id ="1";
        $ileDeFrance->title ="Île-de-France";
        $ileDeFrance->save();

        $hautDeFrance = new Category_region();
        $hautDeFrance->pays_id ="1";
        $hautDeFrance->title ="Haut-de-France";
        $hautDeFrance->save();

        $grandEst = new Category_region();
        $grandEst->pays_id ="1";
        $grandEst->title ="Grand-Est";
        $grandEst->save();

        $corse = new Category_region();
        $corse->pays_id ="1";
        $corse->title ="Corse";
        $corse->save();

        $centreValDeLoire = new Category_region();
        $centreValDeLoire->pays_id ="1";
        $centreValDeLoire->title ="Centre-Val-de-Loire";
        $centreValDeLoire->save();

        $bretagne = new Category_region();
        $bretagne->pays_id ="1";
        $bretagne->title ="Bretagne";
        $bretagne->save();







        $RegionAtlantique = new Category_region();
        $RegionAtlantique->pays_id ="2";
        $RegionAtlantique->title ="Région de l'Atlantique";
        $RegionAtlantique->save();

        $CentreDuCanada = new Category_region();
        $CentreDuCanada->pays_id ="2";
        $CentreDuCanada->title ="Centre du Canada";
        $CentreDuCanada->save();

        $ProvinceDesPrairies = new Category_region();
        $ProvinceDesPrairies->pays_id ="2";
        $ProvinceDesPrairies->title ="Provences des Prairies";
        $ProvinceDesPrairies->save();

        $CoteOuest = new Category_region();
        $CoteOuest->pays_id ="2";
        $CoteOuest->title ="Côte Ouest";
        $CoteOuest->save();

        $Nord = new Category_region();
        $Nord->pays_id ="2";
        $Nord->title ="Nord";
        $Nord->save();




    }
}
