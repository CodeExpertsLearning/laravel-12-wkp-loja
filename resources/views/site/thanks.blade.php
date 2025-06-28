<x-layouts.site>
    <div class="w-full mt-20 text-white">
        <h3 class="text-2xl font-extrabold mb-4">Obrigado, compra concluída!</h3>

        <p class="text-xl">
            Código compra: <strong> {{ $order->code }}</strong> <br>
            Sua compra foi registrada e está aguardando a confirmação do pagamento, assim que o status for modificado te
            notificaremos via e-mail.
        </p>

    </div>
</x-layouts.site>
