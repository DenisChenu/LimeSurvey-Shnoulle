<?php

/**
 * Array by column
 *
 * @var $anscount
 * @var $cellwidth
 */
 ?>
<table class="table question subquestion-list questions-list array-by-columns">
    <colgroup>
        <col class="col-answers" style='width: <?php echo $answerwidth; ?>%;' />
        <?php foreach ($aQuestions as $i=>$question): ?>
            <col
                class="answers-list radio-list <?php echo ($i % 2 == 0)?' array2':' array1';?> <?php if($question['errormandatory']): echo " has-error"; endif; ?>"
                style='width: <?php echo $cellwidth; ?>%;'
                role="radiogroup"
                aria-labelledby="answertext<?php echo $question['myfname'];?>"
                >
                <!-- @todo : control if radiogroup can be used in col : https://www.w3.org/TR/wai-aria/roles -->
        <?php endforeach; ?>
    </colgroup>
    <thead>
        <tr class=''>
            <td>&nbsp;</td>
            <?php
            foreach ($aQuestions as $i=>$question): ?>
                <th id="answertext<?php echo $question['myfname'];?>" class="answertext control-label <?php if($question['errormandatory']){ echo " error-mandatory";} ?>">
                    <?php echo $question['question']; ?>
                </th>
            <?php endforeach; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($labels as $ansrow): ?>
            <tr id="javatbd<?php echo $ansrow['code'];?>" class="answers-list">
                <th class="answertext" id="label-<?php echo $ansrow['code'];?>">
                    <?php echo $ansrow['answer']; ?>
                </th>
                <?php
                foreach ($anscode as $i => $ld): ?>
                    <td class="answer_cell_<?php echo $ld;?> answer-item radio-item">
                            <input
                                type="radio"
                                name="<?php echo $aQuestions[$i]['myfname']; ?>"
                                value="<?php echo $ansrow['code']; ?>"
                                id="answer<?php echo $aQuestions[$i]['myfname']; ?>-<?php echo $ansrow['code']; ?>"
                                <?php echo $checked[$ansrow['code']][$ld]; ?>
                                onclick='<?php echo $checkconditionFunction; ?>(this.value, this.name, this.type)'
                                aria-labelledby="label-<?php echo $ansrow['code'];?>"
                                 />
                                <label class="ls-label-xs-visibility " for="answer<?php echo $aQuestions[$i]['myfname']; ?>-<?php echo $ansrow['code']; ?>">
                                    <?php echo $aQuestions[$i]['question'];?>
                                </label>
                    </td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php foreach ($anscode as $i => $ld): ?>
    <input
        type="hidden"
        name="java<?php echo $aQuestions[$i]['myfname']; ?>"
        id="java<?php echo $aQuestions[$i]['myfname']; ?>"
        value="<?php echo $aQuestions[$i]['myfname_value']; ?>"
    />
<?php endforeach; ?>
