@extends ('layouts.home')

@section ('content')
<div class="ui container" id="terms-container">
  @if (config('app.locale') == 'es')
    <h1>Personas Perdidas Condiciones del servicio</h1>
    <h3>1. Términos</h3>
    <p>Al acceder al sitio web <a href="http://personasperdidas.org.ar"> http://personasperdidas.org.ar</a>, usted acepta estar de acuerdo con estos términos de servicio, todas las leyes y reglamentos aplicables, y acepta que es responsable del cumplimiento de las leyes locales aplicables. Si no está de acuerdo con cualquiera de estos términos, está prohibido el uso o acceso a este sitio. Los materiales contenidos en este sitio web están protegidos por derechos de autor y por marcas registradas.</p>
    <h3>2. Licencia de uso</h3>
    <ol type="a">
      <li>
        Se concede permiso para descargar temporalmente una copia de los materiales (información o software) en el sitio de las Personas Perdidas por sólo transitoria de visión personal, no comercial. Esta es la concesión de una licencia, no una transferencia de título, y bajo esta licencia no podrá:
        <ol type = "i">
          <li>modificar o copiar los materiales; </li>
          <li>utilizar los materiales para cualquier propósito comercial, o para cualquier exhibición pública (comercial o no comercial);</li>
          <li>intentar descompilar o realizar ingeniería inversa cualquier software contenido en el sitio web de las Personas Perdidas;</li>
          <li>eliminar cualquier derecho de autor u otros notaciones de propiedad de los materiales; o</li>
          <li>transferir el material a otra persona o "espejo" de los materiales en cualquier otro servidor.</li>
        </ol>
      </li>
      <li>Esta licencia terminará automáticamente si usted viola cualquiera de estas restricciones y puede ser denunciado por Personas Perdidas en cualquier momento. Al terminar su visión de estos materiales o al término de esta licencia, deberá destruir cualquier material descargado en su poder ya sea en formato impreso o electrónico. </li>
    </ol>
    <h3>3. Exención de responsabilidad</h3>
    <ol type = "a">
      <li>Los materiales en el sitio web de las Personas Perdidas se proporcionan "tal cual" son. Personas Perdidas no ofrece ninguna garantía, expresa o implícita, y por la presente renuncia y niega todas las otras garantías, incluyendo, sin limitación, las garantías implícitas o condiciones de comerciabilidad, adecuación para un propósito particular o no infracción de la propiedad intelectual o cualquier otra violación de los derechos.</li>
      <li>Además, Personas Perdidas no garantiza ni hace ninguna representación sobre la exactitud, los resultados probables, o la fiabilidad de la utilización de los materiales en su sitio web o de otro tipo relativa a los materiales o en cualquier sitio ligado a este sitio.</li>
    </ol>
    <h3>4. Limitaciones</h3>
    <p>En ningún caso Personas Perdidas o sus proveedores serán responsables por cualquier daño (incluyendo, sin limitación, daños por pérdida de datos o beneficios, o debido a la interrupción de la iniciativa) que resulten del uso o la imposibilidad de usar los materiales en la página web de Personas Perdidas, incluso si Personas Perdidas o un representante autorizado de Perdidas Perdidas ha sido notificado en forma oral o por escrito de la posibilidad de tales daños. Debido a que algunas jurisdicciones no permiten limitaciones en garantías implícitas o limitaciones de responsabilidad por daños indirectos o incidentales, estas limitaciones pueden no aplicarse en su caso.</p>
    <h3>5. La exactitud de los materiales</h3>
    <p>Los materiales que aparecen en la página web de Personas Perdidas podrían incluir aspectos técnicos, tipográficos o fotográficos erróneos. Personas Perdidas no garantiza que cualquiera de los materiales en su sitio web sea preciso, completo o actualizado. Personas Perdidas puede hacer cambios a los materiales contenidos en su sitio web en cualquier momento sin previo aviso. Sin embargo Personas Perdidas no posee ningún compromiso de actualizar los materiales.</p>
    <h3>6. Enlaces</h3>
    <p>Personas Perdidas no ha revisado todos los sitios vinculados a su sitio web y no es responsable de los contenidos de dicho sitio. La inclusión de estos vínculos no implica aprobación por parte del sitio web de Personas Perdidas. El uso de cualquier sitio web vinculado corre por riesgo y cuenta propia del usuario.</p>
    <h3>7. Modificaciones</h3>
    <p>Personas Perdidas puede revisar estos términos de servicio para su sitio web en cualquier momento sin previo aviso. Mediante el uso de este sitio web usted acepta estar obligado por la versión actual de estos Términos de servicio.</p>
    <h3>8. Ley aplicable</h3>
    <p>Estos términos y condiciones se regirán e interpretarán de acuerdo con las leyes de Buenos Aires, Argentina y se someten irrevocablemente a la jurisdicción exclusiva de los tribunales de ese Estado o lugar.</p>
  @else
    <h1>Personas Perdidas Terms of Service</h1>
    <h3>1. Terms</h3>
    <p>By accessing the website at <a href="http://personasperdidas.org.ar">http://personasperdidas.org.ar</a>, you are agreeing to be bound by these terms of service, all applicable laws and regulations, and agree that you are responsible for compliance with any applicable local laws. If you do not agree with any of these terms, you are prohibited from using or accessing this site. The materials contained in this website are protected by applicable copyright and trademark law.</p>
    <h3>2. Use License</h3>
    <ol type="a">
      <li>
        Permission is granted to temporarily download one copy of the materials (information or software) on Personas Perdidas's website for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title, and under this license you may not:
        <ol type="i">
          <li>modify or copy the materials;</li>
          <li>use the materials for any commercial purpose, or for any public display (commercial or non-commercial);</li>
          <li>attempt to decompile or reverse engineer any software contained on Personas Perdidas's website;</li>
          <li>remove any copyright or other proprietary notations from the materials; or</li>
          <li>transfer the materials to another person or "mirror" the materials on any other server.</li>
        </ol>
      </li>
      <li>This license shall automatically terminate if you violate any of these restrictions and may be terminated by Personas Perdidas at any time. Upon terminating your viewing of these materials or upon the termination of this license, you must destroy any downloaded materials in your possession whether in electronic or printed format.</li>
    </ol>
    <h3>3. Disclaimer</h3>
    <ol type="a">
      <li>The materials on Personas Perdidas's website are provided on an 'as is' basis. Personas Perdidas makes no warranties, expressed or implied, and hereby disclaims and negates all other warranties including, without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights.</li>
      <li>Further, Personas Perdidas does not warrant or make any representations concerning the accuracy, likely results, or reliability of the use of the materials on its website or otherwise relating to such materials or on any sites linked to this site.</li>
    </ol>
    <h3>4. Limitations</h3>
    <p>In no event shall Personas Perdidas or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption) arising out of the use or inability to use the materials on Personas Perdidas's website, even if Personas Perdidas or a Personas Perdidas authorized representative has been notified orally or in writing of the possibility of such damage. Because some jurisdictions do not allow limitations on implied warranties, or limitations of liability for consequential or incidental damages, these limitations may not apply to you.</p>
    <h3>5. Accuracy of materials</h3>
    <p>The materials appearing on Personas Perdidas's website could include technical, typographical, or photographic errors. Personas Perdidas does not warrant that any of the materials on its website are accurate, complete or current. Personas Perdidas may make changes to the materials contained on its website at any time without notice. However Personas Perdidas does not make any commitment to update the materials.</p>
    <h3>6. Links</h3>
    <p>Personas Perdidas has not reviewed all of the sites linked to its website and is not responsible for the contents of any such linked site. The inclusion of any link does not imply endorsement by Personas Perdidas of the site. Use of any such linked website is at the user's own risk.</p>
    <h3>7. Modifications</h3>
    <p>Personas Perdidas may revise these terms of service for its website at any time without notice. By using this website you are agreeing to be bound by the then current version of these terms of service.</p>
    <h3>8. Governing Law</h3>
    <p>These terms and conditions are governed by and construed in accordance with the laws of Buenos Aires, Argentina and you irrevocably submit to the exclusive jurisdiction of the courts in that State or location.</p>
  @endif
</div>
@endsection