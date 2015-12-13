{* Random screenshot. *}
{assign var='rand_files' value=$random_shot.screenshot->getFiles()}
{assign var='rand_max' value=$rand_files|@count}
{assign var='rand_pos' value=0|rand:$rand_max-1}
{assign var='rand_file' value=$rand_files[$rand_pos]}

{* Introduction header, included from index.tpl *}
<div id="intro_header">
	{* Screenshots. *}
	<div class="sshots">
		<div class="rbtop">
			<div>
				<p>
					{include file='shadowed_text.tpl' text='Screenshots' shadowcolor='#fff' textcolor='#356a02'}
				</p>
			</div>
		</div>
		<div class="rbcontent">
			<a href="screenshots/{$random_shot.category}/{$random_shot.screenshot->getCategory()}/{$rand_pos+1}" id="screenshots_random">
				<img src="{$smarty.const.DIR_SCREENSHOTS}/{$rand_file.filename}.jpg" width="128" height="96" title="Cliquez pour afficher en taille réelle" alt="Capture d'écran aléatoire">
			</a>
		</div>
		<div class="rbbot">
			<div>
				<p>
					<a href="screenshots/" id="screenshots_prev">&laquo; précédent</a>
					<a href="screenshots/" id="screenshots_next">suivant &raquo;</a>
				</p>
			</div>
		</div>
	</div>

	{* Introduction text. *}
	<div class="rbroundbox intro">
		<div class="rbtop">
			<div>
				<p>
					{include file='shadowed_text.tpl' text='C&apos;est quoi ScummVM ?' shadowcolor='#fff' textcolor='#356a02'}
				</p>
			</div>
		</div>
		<div class="rbcontent">
			<div class="rbwrapper">
				<p>
					ScummVM est un logiciel qui vous permet de jouer certain jeux d'aventures graphiques de type
					'point-and-click' (pointer et cliquer), à condition que vous possédiez les fichiers de données
					du jeu. Le plus astucieux: ScummVM remplace juste les exécutables fournis avec les jeux, vous
					permettant de jouer sur les systèmes pour lesquels ils n'ont jamais été conçus !
				</p>
				<p>
					ScummVM supporte de nombreux jeux d'aventure, y compris les jeux LucasArts basés sur le système
					SCUMM (tel que <i>Monkey Island</i> 1-3, <i>Day of the Tentacle</i>, <i>Sam &amp; Max</i>, ...),
					de nombreux jeux Sierra utilisant les système AGI ou SCI (tel que <i>King's Quest</i> 1-6,
					<i>Space Quest</i> 1-5, ...), <i>Discworld</i> 1 et 2, <i>Simon the Sorcerer</i> 1 et 2,
					<i>Beneath A Steel Sky</i>, <i>Lure of the Temptress</i>, <i>Les chevaliers de Baphomet</i>
					(Broken Sword I), <i>Les Boucliers de Quetzalcoatl</i> (Broken Sword II), <i>L'amazone queen</i>
					(Flight of the Amazon Queen), <i>Gobliiins</i> 1-3, <i>Legend of Kyrandia</i> 1-3, un grand
					nombre de jeux pour enfants de Humongous Entertainment (incluant les jeux <i>Marine Malice</i>
					et <i>Pouce-Pouce</i>) et bien plus encore.
				<p>
					Vous pouvez trouver la liste complète des jeux supportés et de la qualité du support sur la
					<a href="compatibility/">page de compatibilité</a>. ScummVM est activement dévelopé, donc
					revenez vérifier cette liste régulièrement. Parmis les platformes supportées, vous pouvez
					jouer à ces jeux avec ScummVM sur Windows, Linux, Mac OS X, Dreamcast, PocketPC, PalmOS, AmigaOS,
					BeOS, OS/2, PSP, PS2, SymbianOS et bien plus encore...
				</p>
				<p>
					Vous pouvez faire part de vos commentaires et suggestions sur notre forum et canal IRC,
					<a href="irc://irc.freenode.net/scummvm">#scummvm on irc.freenode.net</a>. Mais avant de poster
					veuillez lire notre <a href="faq/">FAQ</a>.
				</p>
			</div>
		</div>
		<div class="rbbot"><div><p>&nbsp;</p></div></div>
	</div>
</div>
