<?php

namespace App\Observers;

use App\Filament\Resources\OrderResource;
use App\Models\Order;
use App\Models\User;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     */
    public function created(Order $order): void
    {
        // 1. Recupera todos los super admins
        $superAdmins = User::role('super_admin')->get();

        // 3. Envía la notificación a cada admin
        foreach ($superAdmins as $admin) {
            Notification::make()
                ->title('¡Nueva orden creada!')
                ->body("Se ha registrado la orden #{$order->id} por un total de {$order->total} Bs.")
                ->success()
                ->icon('heroicon-s-shopping-cart')
                ->actions([
                    // new FilamentNotificationAction('edit').button()
                    // 'Ver orden',
                    // OrderResource::getUrl('view',[ $order])
                ])
                // ->url(route('filament.resources.orders.edit', ['record' => $order->id]))
                ->sendToDatabase($admin);
        }
    }

    /**
     * Handle the Order "updated" event.
     */
    public function updated(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "deleted" event.
     */
    public function deleted(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     */
    public function restored(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     */
    public function forceDeleted(Order $order): void
    {
        //
    }
}
