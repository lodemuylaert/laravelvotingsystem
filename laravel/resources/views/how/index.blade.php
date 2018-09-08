@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="jumbotron">
            <div class="page-header">
                <h1 class="text-center pagetitle">Hoe moet je stemmen ?</h1>
            </div>
            <p class="text-center pagesubtitle">Hier vind je hoe je moet stemmen en wat de regels van het stemmen zijn.</p>
        </div>



            <section class="how">
                <div>
                    <p class="text-left regulartext">Om geldig te stemmen kun je ofwel: </p>
                        <ul class="regulartext">
                            <li>een lijststem geven bovenaan een kandidatenlijst</li>
                            <li>één of meerdere kandidaten binnen één lijst je stem geven (max 10)</li>
                            <li>een lijststem én één of meerdere kandidaten binnen één lijst je stem geven</li>
                        </ul>
                    <p class="regulartext">Men kan een voorkeurstem of een lijststem uitbrengen. Indien men een lijststem uitbrengt mag men geen voorkeurstemmen uitbrengen binnen dezelefde lijst</p>
                    <p class="regulartext">Om geldig te stemmen moet je in elk geval binnen één lijst blijven. Een blanco stem wordt niet meegeteld bij het verdelen van de zetels. Ook een ongeldige stem wordt niet meegeteld. Met de stemcomputer kun je niet ongeldig stemmen.</p>
                </div>
            </section>
    </div>
@endsection
