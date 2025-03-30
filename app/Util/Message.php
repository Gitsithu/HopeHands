<?php
namespace App\Util;

enum Message: String
{
    case createdSuccess = 'Successfully Created';
    case createdFail = 'Failed to Created';
    case updatedSuccess = 'Successfully Updated';
    case updatedFail = 'Failed to Updated';
    case deletedSuccess = 'Successfully Deleted';
    case deletedFail = 'Failed to Deleted';
    case searchSuccess = 'Search Success';
    case searchFail = 'Failed to Search';

    case editConfirmation = 'Are you sure you want to update this content?';

    case deleteConfirmation = 'Do you want to delete this content?';

    

}
