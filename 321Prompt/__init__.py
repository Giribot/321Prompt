import gradio as gr
from modules import scripts

class PromptGeneratorScript(scripts.Script):
    def title(self):
        return "Prompt Generator"

    def show(self, is_img2img):
        return True

    def ui(self, is_img2img):
        start_phrase1 = gr.Textbox(label="Début de la phrase 1", placeholder="Un [ chat: chien: ")
        start_value1 = gr.Number(label="Valeur de départ 1", value=0.0)
        end_value1 = gr.Number(label="Valeur d'arrivée 1", value=1.0)
        end_phrase1 = gr.Textbox(label="Fin de la phrase 1", placeholder="] dans un jardin.")
        num_phrases1 = gr.Number(label="Nombre de phrases 1", value=10)

        start_phrase2 = gr.Textbox(label="Début de la phrase 2", placeholder="le temps est [ beau: pluvieux: ", optional=True)
        start_value2 = gr.Number(label="Valeur de départ 2", value=0.0, optional=True)
        end_value2 = gr.Number(label="Valeur d'arrivée 2", value=1.0, optional=True)
        end_phrase2 = gr.Textbox(label="Fin de la phrase 2", placeholder="] sur la montagne.", optional=True)
        num_phrases2 = gr.Number(label="Nombre de phrases 2", value=10, optional=True)

        generate_button = gr.Button("Générer")
        output = gr.Textbox(label="Résultats", lines=10, interactive=False)

        def generate_phrases(start_phrase1, start_value1, end_value1, end_phrase1, num_phrases1,
                             start_phrase2, start_value2, end_value2, end_phrase2, num_phrases2):
            increment1 = (end_value1 - start_value1) / (num_phrases1 - 1)
            increment2 = (end_value2 - start_value2) / (num_phrases2 - 1) if start_phrase2 else 0

            combined_results = ""
            max_phrases = max(num_phrases1, num_phrases2)
            for i in range(max_phrases):
                current_value1 = start_value1 + (increment1 * i)
                current_value2 = start_value2 + (increment2 * i) if start_phrase2 else ''
                phrase1 = f"{start_phrase1}{current_value1}{end_phrase1}"
                phrase2 = f", {start_phrase2}{current_value2}{end_phrase2}" if start_phrase2 else ''
                combined_results += phrase1 + phrase2 + "\n"

            return combined_results

        generate_button.click(fn=generate_phrases, 
                              inputs=[start_phrase1, start_value1, end_value1, end_phrase1, num_phrases1,
                                      start_phrase2, start_value2, end_value2, end_phrase2, num_phrases2], 
                              outputs=output)

        return [start_phrase1, start_value1, end_value1, end_phrase1, num_phrases1,
                start_phrase2, start_value2, end_value2, end_phrase2, num_phrases2, generate_button, output]

scripts.register_script(PromptGeneratorScript())
