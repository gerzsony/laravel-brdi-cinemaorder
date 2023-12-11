 <div style="background-color: white;border: 2px solid #0f0870;box-shadow: 20px -13px 1px 1px #0f0870;
        width: fit-content;padding: 1rem 1rem;font-family: system-ui;">

            <h3 style="text-align: center; font-size: large;"> Jegyrendelés</h3>
            <h4 style="font-size: medium">Kedves  {{ $name }}</h4>
            <p style="font-size: medium">
                Az aktuális eseményre Önnek a következő szék(ek) re szól a foglalása:
            </p>
            <p style="font-size: medium">
            {{ $seat_ids }}
            </p>
            <br/>
            <small>Köszönjük a foglalását, jó szórakozást!</small>

    </div>