<?php

namespace App\Observers;

use App\Models\Equipamento;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailPingDownFirst;

class EquipamentoObserver
{
    /**
     * Handle the Equipamento "created" event.
     *
     * @param  \App\Models\Equipamento  $equipamento
     * @return void
     */
    public function created(Equipamento $equipamento)
    {
        //
    }

    /**
     * Handle the Equipamento "updated" event.
     *
     * @param  \App\Models\Equipamento  $equipamento
     * @return void
     */
    public function updated(Equipamento $equipamento)
    {

    }

        /**
     * Handle the Equipamento "updated" event.
     *
     * @param  \App\Models\Equipamento  $equipamento
     * @return void
     */
    public function updating(Equipamento $equipamento)
    {
        if($equipamento->ping_status == 'Down' && $equipamento->ping_down_email_date == null){
            Mail::queue(new EmailPingDownFirst($equipamento));
            $equipamento->ping_down_email_date = date('Y-m-d H:i:s');
        }

        if($equipamento->ping_status == 'Up'){
            $equipamento->ping_down_email_date = null;
        }
    }

    /**
     * Handle the Equipamento "deleted" event.
     *
     * @param  \App\Models\Equipamento  $equipamento
     * @return void
     */
    public function deleted(Equipamento $equipamento)
    {
        //
    }

    /**
     * Handle the Equipamento "restored" event.
     *
     * @param  \App\Models\Equipamento  $equipamento
     * @return void
     */
    public function restored(Equipamento $equipamento)
    {
        //
    }

    /**
     * Handle the Equipamento "force deleted" event.
     *
     * @param  \App\Models\Equipamento  $equipamento
     * @return void
     */
    public function forceDeleted(Equipamento $equipamento)
    {
        //
    }
}
