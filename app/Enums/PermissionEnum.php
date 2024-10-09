<?php

namespace App\Enums;

enum PermissionEnum: string
{
    /**
     * define the permission for assets menu.
     */
    case CreateAssets = 'create-assets';
    case ReadAssets = 'read-assets';
    case UpdateAssets = 'update-assets';
    case DeleteAssets = 'delete-assets';
    case DownloadAssets = 'download-assets';
    case ArchiveAssets = 'archive-assets';
    case UnarchivedAssets = 'unarchived-assets';

    /**
     * define the permission for asset-histories menu.
     */
    case CreateAssetHistories = 'create-asset-histories';
    case ReadAssetHistories = 'read-asset-histories';
    case UpdateAssetHistories = 'update-asset-histories';
    case DeleteAssetHistories = 'delete-asset-histories';

    /**
     * define the permission for asset-finances menu.
     */
    case CreateAssetFinances = 'create-asset-finances';
    case ReadAssetFinances = 'read-asset-finances';
    case UpdateAssetFinances = 'update-asset-finances';
    case DeleteAssetFinances = 'delete-asset-finances';

    /**
     * define the permission for categories menu.
     */
    case CrudCategories = 'crud-categories';

    /**
     * define the permission for brands menu.
     */
    case CrudBrands = 'crud-brands';

    /**
     * define the permission for distributors menu.
     */
    case CrudDistributors = 'crud-distributors';

    /**
     * define the permission for responsible persons menu.
     */
    case CrudResponsiblePersons = 'crud-responsible-persons';

    /**
     * define the permission for locations menu.
     */
    case CrudLocations = 'crud-locations';

    /**
     * define the permission for prints menu.
     */
    case CreatePrints = 'create-prints';

    /**
     * Get the label for the permission enum.
     */
    public function label(): string
    {
        return match ($this) {
            PermissionEnum::CreateAssets => __('Create Asset'),
            PermissionEnum::ReadAssets => __('Read Asset'),
            PermissionEnum::UpdateAssets => __('Update Asset'),
            PermissionEnum::DeleteAssets => __('Delete Asset'),
            PermissionEnum::DownloadAssets => __('Download Asset'),
            PermissionEnum::ArchiveAssets => __('Archive Asset'),
            PermissionEnum::UnarchivedAssets => __('Unarchived Asset'),
            PermissionEnum::CreateAssetHistories => __('Create Asset History'),
            PermissionEnum::ReadAssetHistories => __('Read Asset History'),
            PermissionEnum::UpdateAssetHistories => __('Update Asset History'),
            PermissionEnum::DeleteAssetHistories => __('Delete Asset History'),
            PermissionEnum::CreateAssetFinances => __('Create Asset Finance'),
            PermissionEnum::ReadAssetFinances => __('Read Asset Finance'),
            PermissionEnum::UpdateAssetFinances => __('Update Asset Finance'),
            PermissionEnum::DeleteAssetFinances => __('Delete Asset Finance'),
            PermissionEnum::CrudCategories => __('Menu Category'),
            PermissionEnum::CrudBrands => __('Menu Brand'),
            PermissionEnum::CrudDistributors => __('Menu Distributor'),
            PermissionEnum::CrudResponsiblePersons => __('Menu Responsible Person'),
            PermissionEnum::CrudLocations => __('Menu Location'),
            PermissionEnum::CreatePrints => __('Print QR Code'),
        };
    }
}
