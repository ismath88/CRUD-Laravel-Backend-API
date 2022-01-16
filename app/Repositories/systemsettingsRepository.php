<?php

namespace App\Repositories;

use App\Models\systemsettings;
use App\Repositories\BaseRepository;

/**
 * Class systemsettingsRepository
 * @package App\Repositories
 * @version May 26, 2020, 7:13 pm UTC
*/

class systemsettingsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'gold_user_limit',
        'platinum_user_limit',
        'topagent_limit',
        'topagent_limit_days',
        'commission',
        'gst',
        'cutoff_date_invoice'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return systemsettings::class;
    }
}
