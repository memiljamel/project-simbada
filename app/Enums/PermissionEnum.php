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
    case VerifyAssets = 'verify-assets';

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
            PermissionEnum::CreateAssets => __('Buat Asset'),
            PermissionEnum::ReadAssets => __('Lihat Asset'),
            PermissionEnum::UpdateAssets => __('Ubah Aset'),
            PermissionEnum::DeleteAssets => __('Hapus Aset'),
            PermissionEnum::DownloadAssets => __('Unduh Aset'),
            PermissionEnum::ArchiveAssets => __('Arsipkan Aset'),
            PermissionEnum::UnarchivedAssets => __('Batalkan Arsip Aset'),
            PermissionEnum::VerifyAssets => __('Verifikasi Aset'),
            PermissionEnum::CreateAssetHistories => __('Buat Riwayat'),
            PermissionEnum::ReadAssetHistories => __('Lihat Riwayat'),
            PermissionEnum::UpdateAssetHistories => __('Ubah Riwayat'),
            PermissionEnum::DeleteAssetHistories => __('Hapus Riwayat'),
            PermissionEnum::CreateAssetFinances => __('Buat Keuangan'),
            PermissionEnum::ReadAssetFinances => __('Lihat Keuangan'),
            PermissionEnum::UpdateAssetFinances => __('Ubah Keuangan'),
            PermissionEnum::DeleteAssetFinances => __('Hapus Keuangan'),
            PermissionEnum::CrudCategories => __('Menu Jenis Barang'),
            PermissionEnum::CrudBrands => __('Menu Merk'),
            PermissionEnum::CrudDistributors => __('Menu Distributor'),
            PermissionEnum::CrudResponsiblePersons => __('Menu Penanggung Jawab'),
            PermissionEnum::CrudLocations => __('Menu Lokasi'),
            PermissionEnum::CreatePrints => __('Cetak QR-Code'),
        };
    }
}
