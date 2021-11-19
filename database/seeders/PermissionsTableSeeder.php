<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'medicament_create',
            ],
            [
                'id'    => 18,
                'title' => 'medicament_edit',
            ],
            [
                'id'    => 19,
                'title' => 'medicament_show',
            ],
            [
                'id'    => 20,
                'title' => 'medicament_delete',
            ],
            [
                'id'    => 21,
                'title' => 'medicament_access',
            ],
            [
                'id'    => 22,
                'title' => 'donnee_access',
            ],
            [
                'id'    => 23,
                'title' => 'site_create',
            ],
            [
                'id'    => 24,
                'title' => 'site_edit',
            ],
            [
                'id'    => 25,
                'title' => 'site_show',
            ],
            [
                'id'    => 26,
                'title' => 'site_delete',
            ],
            [
                'id'    => 27,
                'title' => 'site_access',
            ],
            [
                'id'    => 28,
                'title' => 'fabriquant_create',
            ],
            [
                'id'    => 29,
                'title' => 'fabriquant_edit',
            ],
            [
                'id'    => 30,
                'title' => 'fabriquant_show',
            ],
            [
                'id'    => 31,
                'title' => 'fabriquant_delete',
            ],
            [
                'id'    => 32,
                'title' => 'fabriquant_access',
            ],
            [
                'id'    => 33,
                'title' => 'classe_therapeutique_create',
            ],
            [
                'id'    => 34,
                'title' => 'classe_therapeutique_edit',
            ],
            [
                'id'    => 35,
                'title' => 'classe_therapeutique_show',
            ],
            [
                'id'    => 36,
                'title' => 'classe_therapeutique_delete',
            ],
            [
                'id'    => 37,
                'title' => 'classe_therapeutique_access',
            ],
            [
                'id'    => 38,
                'title' => 'formule_create',
            ],
            [
                'id'    => 39,
                'title' => 'formule_edit',
            ],
            [
                'id'    => 40,
                'title' => 'formule_show',
            ],
            [
                'id'    => 41,
                'title' => 'formule_delete',
            ],
            [
                'id'    => 42,
                'title' => 'formule_access',
            ],
            [
                'id'    => 43,
                'title' => 'famille_create',
            ],
            [
                'id'    => 44,
                'title' => 'famille_edit',
            ],
            [
                'id'    => 45,
                'title' => 'famille_show',
            ],
            [
                'id'    => 46,
                'title' => 'famille_delete',
            ],
            [
                'id'    => 47,
                'title' => 'famille_access',
            ],
            [
                'id'    => 48,
                'title' => 'fournisseur_create',
            ],
            [
                'id'    => 49,
                'title' => 'fournisseur_edit',
            ],
            [
                'id'    => 50,
                'title' => 'fournisseur_show',
            ],
            [
                'id'    => 51,
                'title' => 'fournisseur_delete',
            ],
            [
                'id'    => 52,
                'title' => 'fournisseur_access',
            ],
            [
                'id'    => 53,
                'title' => 'reference_create',
            ],
            [
                'id'    => 54,
                'title' => 'reference_edit',
            ],
            [
                'id'    => 55,
                'title' => 'reference_show',
            ],
            [
                'id'    => 56,
                'title' => 'reference_delete',
            ],
            [
                'id'    => 57,
                'title' => 'reference_access',
            ],
            [
                'id'    => 58,
                'title' => 'representants_locaux_create',
            ],
            [
                'id'    => 59,
                'title' => 'representants_locaux_edit',
            ],
            [
                'id'    => 60,
                'title' => 'representants_locaux_show',
            ],
            [
                'id'    => 61,
                'title' => 'representants_locaux_delete',
            ],
            [
                'id'    => 62,
                'title' => 'representants_locaux_access',
            ],
            [
                'id'    => 63,
                'title' => 'materiel_create',
            ],
            [
                'id'    => 64,
                'title' => 'materiel_edit',
            ],
            [
                'id'    => 65,
                'title' => 'materiel_show',
            ],
            [
                'id'    => 66,
                'title' => 'materiel_delete',
            ],
            [
                'id'    => 67,
                'title' => 'materiel_access',
            ],
            [
                'id'    => 68,
                'title' => 'forme_create',
            ],
            [
                'id'    => 69,
                'title' => 'forme_edit',
            ],
            [
                'id'    => 70,
                'title' => 'forme_show',
            ],
            [
                'id'    => 71,
                'title' => 'forme_delete',
            ],
            [
                'id'    => 72,
                'title' => 'forme_access',
            ],
            [
                'id'    => 73,
                'title' => 'dosage_create',
            ],
            [
                'id'    => 74,
                'title' => 'dosage_edit',
            ],
            [
                'id'    => 75,
                'title' => 'dosage_show',
            ],
            [
                'id'    => 76,
                'title' => 'dosage_delete',
            ],
            [
                'id'    => 77,
                'title' => 'dosage_access',
            ],
            [
                'id'    => 78,
                'title' => 'conditionnement_create',
            ],
            [
                'id'    => 79,
                'title' => 'conditionnement_edit',
            ],
            [
                'id'    => 80,
                'title' => 'conditionnement_show',
            ],
            [
                'id'    => 81,
                'title' => 'conditionnement_delete',
            ],
            [
                'id'    => 82,
                'title' => 'conditionnement_access',
            ],
            [
                'id'    => 83,
                'title' => 'sorty_create',
            ],
            [
                'id'    => 84,
                'title' => 'sorty_edit',
            ],
            [
                'id'    => 85,
                'title' => 'sorty_show',
            ],
            [
                'id'    => 86,
                'title' => 'sorty_delete',
            ],
            [
                'id'    => 87,
                'title' => 'sorty_access',
            ],
            [
                'id'    => 88,
                'title' => 'sorties_medicament_create',
            ],
            [
                'id'    => 89,
                'title' => 'sorties_medicament_edit',
            ],
            [
                'id'    => 90,
                'title' => 'sorties_medicament_show',
            ],
            [
                'id'    => 91,
                'title' => 'sorties_medicament_delete',
            ],
            [
                'id'    => 92,
                'title' => 'sorties_medicament_access',
            ],
            [
                'id'    => 93,
                'title' => 'entrees_medicament_create',
            ],
            [
                'id'    => 94,
                'title' => 'entrees_medicament_edit',
            ],
            [
                'id'    => 95,
                'title' => 'entrees_medicament_show',
            ],
            [
                'id'    => 96,
                'title' => 'entrees_medicament_delete',
            ],
            [
                'id'    => 97,
                'title' => 'entrees_medicament_access',
            ],
            [
                'id'    => 98,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 99,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 100,
                'title' => 'stock_medicament_access',
            ],
            [
                'id'    => 101,
                'title' => 'stocke_materiel_access',
            ],
            [
                'id'    => 102,
                'title' => 'destination_create',
            ],
            [
                'id'    => 103,
                'title' => 'destination_edit',
            ],
            [
                'id'    => 104,
                'title' => 'destination_show',
            ],
            [
                'id'    => 105,
                'title' => 'destination_delete',
            ],
            [
                'id'    => 106,
                'title' => 'destination_access',
            ],
            [
                'id'    => 107,
                'title' => 'nouvelle_entree_create',
            ],
            [
                'id'    => 108,
                'title' => 'nouvelle_entree_edit',
            ],
            [
                'id'    => 109,
                'title' => 'nouvelle_entree_show',
            ],
            [
                'id'    => 110,
                'title' => 'nouvelle_entree_delete',
            ],
            [
                'id'    => 111,
                'title' => 'nouvelle_entree_access',
            ],
            [
                'id'    => 112,
                'title' => 'entree_materiel_create',
            ],
            [
                'id'    => 113,
                'title' => 'entree_materiel_edit',
            ],
            [
                'id'    => 114,
                'title' => 'entree_materiel_show',
            ],
            [
                'id'    => 115,
                'title' => 'entree_materiel_delete',
            ],
            [
                'id'    => 116,
                'title' => 'entree_materiel_access',
            ],
            [
                'id'    => 117,
                'title' => 'incrementation_materiel_create',
            ],
            [
                'id'    => 118,
                'title' => 'incrementation_materiel_edit',
            ],
            [
                'id'    => 119,
                'title' => 'incrementation_materiel_show',
            ],
            [
                'id'    => 120,
                'title' => 'incrementation_materiel_delete',
            ],
            [
                'id'    => 121,
                'title' => 'incrementation_materiel_access',
            ],
            [
                'id'    => 122,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
